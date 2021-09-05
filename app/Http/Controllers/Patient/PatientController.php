<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Admin;
use App\Models\BookedAppointment;
use App\Models\Speciality;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class PatientController extends Controller
{
    
    public function index()
    {
        //dd('');

        $Booked_Appointments = BookedAppointment:: join('doctors','doctors.id', '=', 'booked_appointments.doctorid')
        ->join('specialities','specialities.id','=', 'doctors.specialityid')
        ->where('booked_appointments.patientid',auth::guard('patient')->user()->id)
        ->where('booked_appointments.doctor_action','Not Completed')
        ->get([
                'doctors.name',
                'doctors.imagepath',
                'specialities.name as speciality',
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

        return view('dashboard.patient.home',['Booked_Appointments' => $Booked_Appointments,'adminappdatas'=>$adminappdatas]);
    }

    public function patientprofile()
    {
        $adminappdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);


        return view('dashboard.patient.profile',['adminappdatas'=>$adminappdatas]);
    }

    public function changepassword()
    {
        $adminappdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);


        return view('dashboard.patient.changepassword',['adminappdatas'=>$adminappdatas]);
    }
    
    public function createPatient(Request $request){
        $request -> validate([
            'fullname' => "required|regex:/^[a-zA-Z ]*$/|min:4|max:50",
            'email' => "required|email|unique:patients,email",
            "password" => 'required|alpha_dash|min:4|max:10',
            'cpassword' => 'required|same:password',
            'phoneno' => "required|numeric|unique:patients,phoneno|min:10",
            'agreetnc' => "required",
            'gender' => [
                        'required',
                         Rule::in(['male','female']),
                        ],
        ],[
            'fullname.regex' => 'Full Name can have letters only',
            'email.unique' => 'Email already exists',
            'phoneno.unique' => 'Phone Number already exists',
        ]);    

        //dd($request);

        $add_patient = new Patient;
        
        $add_patient->name = $request->fullname;
        $add_patient->email = $request->email;
        $add_patient->phoneno = $request->phoneno;
        
        $add_patient->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $add_patient->email_verified_at = now();
        $add_patient->remember_token = Str::random(10);
        
        $add_patient -> save();

        if($add_patient){
            return redirect()->route('patient.login')->with('success','Registered Successfully, Use your Email Id and Passwod to login');
        }else{
            return redirect()->back()->with('danger','Sorry Patient is not registered , try again later');
        }


    }

    public function imageupdate(Request  $request){
        $request -> validate([
            'image' => 'required|image|mimes:jpg,png|max:512',
        ],[
            'image.required' => 'Image Is required.',
        ]);

        //dd($request);

        $current_patientid = auth::guard('patient')->user()->id;

        $request ->input();

        $imageName = 'patient_id_'.$current_patientid."_".time().'.'.$request->file('image')->extension();  

        $request->file('image')->move(public_path('assets/img/patients'), $imageName);

        $updtpatientid = $current_patientid;
        
        $update_patient_image =  Patient::find($current_patientid);
        
        $update_patient_image -> imagepath =  $imageName;
        
        $update_patient_image -> save();
        
        if($update_patient_image){
            return  redirect()->route('patient.profile')->with('success','Patient image uploaded successfully');
        }else{
            return  redirect()->route('patient.profile')->with('fail','Patient image failed, try again later');
        }
        
        //return redirect('admin.profile');
    }

    public function updateBasicInformation(Request  $request){
        //dd($request);
        $request -> validate([
            'name' => "required|regex:/^[a-zA-Z ]*$/|min:4|max:50",
            'phoneno' => "required|numeric|min:10",
            'gender' => [
                'required',
                Rule::in(['male','female']),
            ],
            'bloodgrp' => [
                'required',
                Rule::in(['A-','A+','B-','B+','AB-','AB+','O-','O+']),
            ],
            //'phoneno' => "min:10",
            'dateofbirth' => "required|date|date_format:Y-m-d",
            //'dateofbirth' => "before:today",
        ]);


        $current_patientid = auth::guard('patient')->user()->id;

        $update_patient_basicinformation =  Patient::find($current_patientid);

        $update_patient_basicinformation -> name =  $request->name;
        $update_patient_basicinformation -> phoneno =  $request->phoneno;
        $update_patient_basicinformation -> gender =  $request->gender;
        $update_patient_basicinformation -> dateofbirth =  $request->dateofbirth;
        $update_patient_basicinformation -> bloodgrp =  $request->bloodgrp;

        $update_patient_basicinformation -> save();
        
        if($update_patient_basicinformation){
            return  redirect()->route('patient.profile')->with('success','Patient Basic Information uploaded successfully');
        }else{
            return  redirect()->route('patient.profile')->with('fail','Sorry , Patient Basic Information not uploaded, try again later');
        }
        
    
    }

    public function updateAddressInformation(Request  $request){
        $request -> validate([
            'shipaddress' => "required|regex:/^[ A-Za-z0-9()[\],-]*$/|min:5|max:50",
            'state' => "required|alpha|max:50",
            'city' => "required|regex:/^[ A-Za-z()[\],-]*$/|max:50",
            'pincode' => "required|numeric|min:6",
            'country' => "required|alpha|min:3",
        ],[
            'ship-address.required' => 'Address field is required',
            'ship-address.regex' => 'Address field can contain , - only',
            'ship-address.min' => 'Address field must be at least 5 characters.',
            'ship-address.max' => 'Address field cannot me more than 50 characters.',
        ]);

        //dd($request);

        $current_patientid = auth::guard('patient')->user()->id;

        $update_patient_addressInformation =  Patient::find($current_patientid);

        $update_patient_addressInformation -> address =  $request->shipaddress;
        $update_patient_addressInformation -> state =  $request->state;
        $update_patient_addressInformation -> city =  $request->city;
        $update_patient_addressInformation -> zipcode =  $request->pincode;
        $update_patient_addressInformation -> country =  $request->country;
        
        $update_patient_addressInformation -> save();
        
        if($update_patient_addressInformation){
            return  redirect()->route('patient.profile')->with('success','Address Information uploaded successfully');
        }else{
            return  redirect()->route('patient.profile')->with('fail','Sorry Address Information not uploaded, try again later');
        }

    }

    public function updatePassword(Request $request){
        $request -> validate([
            "oldpassword" => 'required|alpha_dash|min:4|max:10',
            'newpassword' => 'required|alpha_dash|min:4|max:10',
            'cnfpassword' => 'required|alpha_dash|same:newpassword|min:4|max:10',
             ]);    

             //dd($request);

            $current_patientid = auth::guard('patient')->user()->id;

            $updtpatientoldpassword = $request->oldpassword;
            
            $oldpassword = auth::guard('patient')->user()->password;

             if (Hash::check($updtpatientoldpassword, $oldpassword)) {
                
                $updtpatientnewpassword = $request->newpassword;
                
                $update_patient_password =  Patient::find($current_patientid);
    
                $update_patient_password -> password =  Hash::make($updtpatientnewpassword);
                
                $update_patient_password -> save();
                
                if($update_patient_password){
    
                    Auth::guard('patient')->logout();
                    return  redirect()->route('patient.login')->with('success','Patient New password changed, login again with new password');
    
                }else{
    
                    return  redirect()->back()->with('fail','Sorry , new password is not saved  , try again later');
                }
                
            }else{
                
                return  redirect()->back()->with('fail','Patient Old password does not match , try again later');
                
            }
    }

    public function check(Request $request){
        $request -> validate([
            "email" => 'required|email|exists:patients,email',
            "password" => 'required|alpha_dash|min:4|max:10',
        ],[
            'email.exists' => 'Sorry , email id does not exist !!!'
        ]);

        //dd($request);

        $creds = $request->only('email','password');

        if(auth::guard('patient')->attempt($creds)){
            return redirect()->route('patient.home');
        }else{
            return redirect()->route('patient.login')->with('fail','Your Credentials are wrong.');
        }
    }

    public function logout(){
        Auth::guard('patient')->logout();
        return redirect()->route('patient.login');
    }
}
