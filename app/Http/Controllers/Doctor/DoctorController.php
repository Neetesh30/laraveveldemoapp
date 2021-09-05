<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\BookedAppointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class DoctorController extends Controller
{
    public function index()
    {
        $Booked_Appointments = BookedAppointment:: join('patients','patients.id', '=', 'booked_appointments.patientid')
        ->where('booked_appointments.doctorid',auth::guard('doctor')->user()->id)
        ->where('booked_appointments.doctor_action','Not Completed')
        ->get([
                'patients.id as patiennt_id',
                'patients.name as patientname',
                'patients.imagepath',
                'booked_appointments.appointment_purpose',
                'booked_appointments.appointment_date',
                'booked_appointments.appointment_time',
                'booked_appointments.payment_paidon',
                'booked_appointments.payment_amount',
                'booked_appointments.appointment_status',
            ]);
        
        
        $Total_patinets_tilltoday = BookedAppointment:: join('patients','patients.id', '=', 'booked_appointments.patientid')
        ->where('booked_appointments.doctorid',auth::guard('doctor')->user()->id)
        ->get();
        
        $totalPatientCount_tilltoday = $Total_patinets_tilltoday->count();
        
        $Total_Appointments_tilltoday = BookedAppointment:: join('patients','patients.id', '=', 'booked_appointments.patientid')
        ->where('booked_appointments.doctorid',auth::guard('doctor')->user()->id)
        ->get();

        $totalAppointmentCount = $Total_Appointments_tilltoday->count(); 
        
        $todaydate = date('Y-m-d');

        $Today_Appointments = BookedAppointment:: join('patients','patients.id', '=', 'booked_appointments.patientid')
        ->where('booked_appointments.appointment_date','like',"%{$todaydate}%")
        ->where('booked_appointments.doctorid',auth::guard('doctor')->user()->id)
        ->get();

        $todayAppointmentCount = $Today_Appointments->count();
        
        $today_booked_appointments = BookedAppointment:: join('patients','patients.id', '=', 'booked_appointments.patientid')
        ->where('booked_appointments.doctorid',auth::guard('doctor')->user()->id)
        ->where('booked_appointments.appointment_date','like',"%{$todaydate}%")
        ->where('booked_appointments.doctor_action','Not Completed')
        ->get([
                'patients.id as patiennt_id',
                'patients.name as patientname',
                'patients.imagepath',
                'booked_appointments.appointment_purpose',
                'booked_appointments.appointment_date',
                'booked_appointments.appointment_time',
                'booked_appointments.payment_paidon',
                'booked_appointments.payment_amount',
                'booked_appointments.appointment_status',
            ]);

            $adminappdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
            ->where('id','1')
            ->get([
                    'appname',
                    'applogoimagepath',
                    'applogofaviconimagepath',
                    'app_contactno',
                ]);

        return view('dashboard.doctor.home',['Booked_Appointments' => $Booked_Appointments,
                    'today_booked_appointments' => $today_booked_appointments,
                    'totalPatientCount_tilltoday' => $totalPatientCount_tilltoday,
                    'totalAppointmentCount' => $totalAppointmentCount,
                    'todayAppointmentCount' => $todayAppointmentCount,
                    'adminappdatas'=>$adminappdatas
                    ]);
    }

    public function doctorprofile()
    {
        $adminappdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);

        return view('dashboard.doctor.profile',['adminappdatas'=>$adminappdatas]);

    }
    
    public function check(Request $request){
        $request -> validate([
            "email" => 'required|email|exists:doctors,email',
            "password" => 'required|min:4|max:10',
        ],[
            'email.exists' => 'Sorry , email id does not exist !!!'
        ]);

        //dd($request);

        $creds = $request->only('email','password');

        if(auth::guard('doctor')->attempt($creds)){
            return redirect()->route('doctor.home');
        }else{
            return redirect()->route('doctor.login')->with('fail','Your Credentials are wrong.');
        }
    }

    public function imageupdate(Request  $request){
        $request -> validate([
            'image' => 'required|image|mimes:jpg,png|max:512',
        ],[
            'image.required' => 'Image Is required.',
        ]);

        //dd($request);

        $current_doctorid = auth::guard('doctor')->user()->id;

        $request ->input();

        $imageName = 'doctor_id_'.$current_doctorid."_".time().'.'.$request->file('image')->extension();  

        $request->file('image')->move(public_path('assets/img/doctors'), $imageName);

        $updtdoctorid = $current_doctorid;
        
        $update_doctor_image =  Doctor::find($current_doctorid);
        
        $update_doctor_image -> imagepath =  $imageName;
        
        $update_doctor_image -> save();
        
        if($update_doctor_image){
            return  redirect()->route('doctor.profile')->with('success','Doctor image uploaded successfully');
        }else{
            return  redirect()->route('doctor.profile')->with('fail','Doctor image failed, try again later');
        }
        
        //return redirect('admin.profile');
    }

    public function updateBasicInformation(Request  $request){
        $request -> validate([
            'name' => "required|min:4|max:50",
            'name' => "regex:/^[a-zA-Z ]*$/",
            'phoneno' => "required|numeric",
            'phoneno' => "min:10",
            'gender' => [
                'required',
                 Rule::in(['Male','Female']),
                ],
            'dateofbirth' => "required|date_format:dd-mm-yyyy",
            'dateofbirth' => "before:today",
        ]);

        //dd($request);

        $current_doctorid = auth::guard('doctor')->user()->id;

        $update_doctor_basicinformation =  Doctor::find($current_doctorid);

        $update_doctor_basicinformation -> name =  $request->name;
        $update_doctor_basicinformation -> phoneno =  $request->phoneno;
        $update_doctor_basicinformation -> gender =  $request->gender;
        $update_doctor_basicinformation -> dateofbirth =  $request->dateofbirth;

        $update_doctor_basicinformation -> save();
        
        if($update_doctor_basicinformation){
            return  redirect()->route('doctor.profile')->with('success','Doctor Basic Information uploaded successfully');
        }else{
            return  redirect()->route('doctor.profile')->with('fail','Sorry , Doctor Basic Information not uploaded, try again later');
        }
        
    
    }

    public function updateAboutMe(Request  $request){
        $request -> validate([
            'aboutme' => "required|min:10|max:500|regex:/^[a-zA-Z0-9 ]*$/",
        ],[
            'aboutme.regex' => 'The About Me format is invalid only letters , numbers and space is allowed',
        ]);

        //dd($request);

        $current_doctorid = auth::guard('doctor')->user()->id;

        $update_doctor_aboutme =  Doctor::find($current_doctorid);

        $update_doctor_aboutme -> aboutme =  $request->aboutme;
        
        $update_doctor_aboutme -> save();
        
        if($update_doctor_aboutme){
            return  redirect()->route('doctor.profile')->with('success','About Me Information uploaded successfully');
        }else{
            return  redirect()->route('doctor.profile')->with('fail','Sorry About Me Information not uploaded, try again later');
        }

    }

    public function updateClinicinfo(Request  $request)
    {
        $request -> validate([
            'clinic_name' => "required|regex:/^[ A-Za-z0-9()[\],-]*$/|max:150",
            'clinic_addr' => "required|regex:/^[ A-Za-z0-9()[\],-]*$/|max:250",
        ],[
            'clinic_name.required' => 'Clinic name is required',
            'clinic_name.max' => 'Clinic name cannot be more than 150 characters',
            'clinic_addr.required' => 'Clinic address is required',
            'clinic_addr.max' => 'Clinic address cannot be more than 150 characters',
            'clinic_name.regex' => 'Clinic name is invalid only letters , numbers and space is allowed',
            'clinic_addr.regex' => 'Clinic address is invalid only letters , numbers and space is allowed',
        ]);

        $current_doctorid = auth::guard('doctor')->user()->id;

        $update_doctor_updateClinicinfo =  Doctor::find($current_doctorid);

        $update_doctor_updateClinicinfo -> clinic_name =  $request->clinic_name;
        $update_doctor_updateClinicinfo -> clinic_addr =  $request->clinic_addr;
        
        $update_doctor_updateClinicinfo -> save();
        
        if($update_doctor_updateClinicinfo){
            return  redirect()->route('doctor.profile')->with('success','Clinic Information uploaded successfully');
        }else{
            return  redirect()->route('doctor.profile')->with('fail','Sorry Clinic Information not uploaded, try again later');
        }


    }

    public function clinicimageupdate(Request  $request)
    {
        $request -> validate([
            'clinicimage' => 'required',
            'clinicimage.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);

        // dd($request);

        $current_doctorid = auth::guard('doctor')->user()->id;

        if($request->hasfile('clinicimage')) {
            $number = 0;
                foreach($request->file('clinicimage') as $file)
            {
                $name = 'doctor_id_'.$current_doctorid."_".time().$number.'.'.$file->extension();
                $file->move(public_path('assets/img/features'), $name);
                $imgData[] = $name;
                $number++;  
            }

            $imgData = implode(",",$imgData);

            $updtdoctorid = $current_doctorid;
        
            $update_clinic_image =  Doctor::find($current_doctorid);

            $previous_clinic_image = auth::guard('doctor')->user()->clinic_imagepath;
        
            $update_clinic_image -> clinic_imagepath =  $imgData.",".$previous_clinic_image;

            // dd($imgData);
    
            $update_clinic_image->save();

            if($update_clinic_image){
                return  redirect()->route('doctor.profile')->with('success','Doctor Clinic Image uploaded successfully');
            }else{
                return  redirect()->route('doctor.profile')->with('fail','Doctor Clinic Image failed, try again later');
            }
    
        }


    }
    
    public function removeclinicImage(Request  $request)
    {
        
        // dd($request);

        $request -> validate([
            'removeimage' => 'required',
        ]);

        // dd($request);

        $current_doctorid = auth::guard('doctor')->user()->id;

        $clinicimage = explode(',',auth::guard('doctor')->user()->clinic_imagepath);
        
       
        foreach ($clinicimage as $newimagedata) {
            $array[] = $newimagedata;
        }


        $removeimage = array_search($request->removeimage,$array);
        if($removeimage !== FALSE){
            unset($array[$removeimage]);
        }

        $imgData = implode(",",$array);

        $update_clinic_image =  Doctor::find($current_doctorid);
        
        $update_clinic_image -> clinic_imagepath =  $imgData;

        $update_clinic_image->save();

        if($update_clinic_image){
            return  redirect()->route('doctor.profile')->with('success','Doctor Clinic Removed uploaded successfully');
        }else{
            return  redirect()->route('doctor.profile')->with('fail','Doctor Clinic Image failed, try again later');
        }

    }

    public function updateAddress(Request  $request)
    {
        $request -> validate([
            'address' => "required|regex:/^[ A-Za-z0-9()[\],-]*$/|min:5|max:50",
            'state' => "required|alpha|max:50",
            'city' => "required|regex:/^[ A-Za-z()[\],-]*$/|max:50",
            'pincode' => "required|numeric|min:6",
            'country' => "required|alpha|min:3",
        ]);

        // dd($request);

        $update_doctor_addr =  Doctor::find(auth::guard('doctor')->user()->id);
        
        $update_doctor_addr -> address =  $request->address;
        $update_doctor_addr -> city =  $request->city;
        $update_doctor_addr -> state =  $request->state;
        $update_doctor_addr -> zipcode =  $request->pincode;
        $update_doctor_addr -> country =  $request->country;
        
            // dd($imgData);
    
            $update_doctor_addr->save();

            if($update_doctor_addr){
                return  redirect()->route('doctor.profile')->with('success','Doctor Address uploaded successfully');
            }else{
                return  redirect()->route('doctor.profile')->with('fail','Doctor Address upload failed, try again later');
            }
    }

    public function updateFees(Request  $request)
    {
        $request -> validate([
            'fees' => "required|numeric|min:100|max:5000",
        ]);

        $update_doctor_fees =  Doctor::find(auth::guard('doctor')->user()->id);
        
        $update_doctor_fees -> doctor_fees =  $request->fees;
        
            // dd($imgData);
    
            $update_doctor_fees->save();

            if($update_doctor_fees){
                return  redirect()->route('doctor.profile')->with('success','Doctor Fees uploaded successfully');
            }else{
                return  redirect()->route('doctor.profile')->with('fail','Doctor Fees upload failed, try again later');
            }
        
    }

    public function serviceSpecializationupdate(Request  $request)
    {
        $request -> validate([
            'services' => "required|regex:/^[ A-Za-z0-9()[\],-]*$/|min:3|max:150",
            'specialization' => "required|regex:/^[ A-Za-z0-9()[\],-]*$/|min:3|max:150",
        ]);

        // dd($request);

        $update_doctor_serviceSpecialization =  Doctor::find(auth::guard('doctor')->user()->id);
        
        $update_doctor_serviceSpecialization -> services =  $request->services;
        $update_doctor_serviceSpecialization -> specialization =  $request->specialization;
        
            // dd($imgData);
    
            $update_doctor_serviceSpecialization->save();

            if($update_doctor_serviceSpecialization){
                return  redirect()->route('doctor.profile')->with('success','Doctor Service and Specialization uploaded successfully');
            }else{
                return  redirect()->route('doctor.profile')->with('fail','Doctor Service and Specialization  upload failed, try again later');
            }
    }

    public function eduUpdate(Request  $request)
    {
        $request -> validate([
            'degree' => "required|regex:/^[ A-Za-z0-9()[\],-]*$/|min:3|max:150",
            'college' => "required|regex:/^[ A-Za-z0-9()[\],-]*$/|min:3|max:150",
            'YearOfCompletion' => "required|numeric|min:1900|max:2021",
        ]);

        $update_doctor_education =  Doctor::find(auth::guard('doctor')->user()->id);
        
        $update_doctor_education -> edu_degree =  $request->degree;
        $update_doctor_education -> edu_college =  $request->college;
        $update_doctor_education -> edu_yearcompleted =  $request->YearOfCompletion;
        
        $update_doctor_education->save();

        if($update_doctor_education){
            return  redirect()->route('doctor.profile')->with('success','Doctor Education record uploaded successfully');
        }else{
            return  redirect()->route('doctor.profile')->with('fail','Doctor Education record upload failed, try again later');
        }
    }

    public function ExperienceUpdate(Request  $request)
    {
        
        $request -> validate([
            'hospital' => "required|regex:/^[ A-Za-z0-9()[\],-]*$/|min:3|max:150",
            'fromyear' => "required|date_format:Y-m-d",
            'toyear' => "required|date_format:Y-m-d",
            'designation' => "required|regex:/^[ A-Za-z0-9()[\],-]*$/|min:3|max:150",
        ]);
        // dd($request);

        $update_doctor_experience =  Doctor::find(auth::guard('doctor')->user()->id);
        
        $update_doctor_experience -> exp_hospitalname =  $request->hospital;
        $update_doctor_experience -> exp_fromtime =  $request->fromyear;
        $update_doctor_experience -> exp_totime =  $request->toyear;
        $update_doctor_experience -> exp_designation =  $request->designation;
        
        $update_doctor_experience->save();

        if($update_doctor_experience){
            return  redirect()->route('doctor.profile')->with('success','Doctor Education record uploaded successfully');
        }else{
            return  redirect()->route('doctor.profile')->with('fail','Doctor Education record upload failed, try again later');
        }
        
    }

    public function updateAward(Request  $request)
    {
        $request -> validate([
            'awards' => "required|regex:/^[ A-Za-z0-9()[\],-]*$/|min:3|max:150",
            'awardsYear' => "required|numeric|min:1940|max:2021",
        ]);

        $update_doctor_award =  Doctor::find(auth::guard('doctor')->user()->id);
        
        $update_doctor_award -> awards_name =  $request->awards;
        $update_doctor_award -> awards_year =  $request->awardsYear;
        
        // dd($imgData);
    
        $update_doctor_award->save();

        if($update_doctor_award){
            return  redirect()->route('doctor.profile')->with('success','Doctor Awards uploaded successfully');
        }else{
            return  redirect()->route('doctor.profile')->with('fail','Doctor Awards  upload failed, try again later');
        }


    }
    
    public function membershipUpdate(Request  $request)
    {
        $request -> validate([
            'membership' => "required|regex:/^[ A-Za-z0-9()[\],-]*$/|min:3|max:150",
        ]);

        $update_doctor_updatemembership =  Doctor::find(auth::guard('doctor')->user()->id);
        
        $update_doctor_updatemembership -> membership_name =  $request->membership;
        
        // dd($imgData);
    
        $update_doctor_updatemembership->save();

        if($update_doctor_updatemembership){
            return  redirect()->route('doctor.profile')->with('success','Doctor Membership uploaded successfully');
        }else{
            return  redirect()->route('doctor.profile')->with('fail','Doctor Membership  upload failed, try again later');
        }


    }

    public function logout(){
        Auth::guard('doctor')->logout();
        return redirect()->route('doctor.login');
    }
}
