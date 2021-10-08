<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Speciality;
use App\Models\Doctor;
use App\Models\Patient;
use PDF;

use Illuminate\Support\Facades\Auth;

class DoctorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){

        //$datas = Speciality::all();

        //dd($datas);

         $datas = Speciality::all();

         $doctorsdata = Doctor::join('specialities','specialities.id', '=', 'doctors.specialityid')
                                ->get(['doctors.name as aliasdoctorname',
                                        'doctors.email',
                                        'doctors.imagepath',
                                        'doctors.status',
                                        'doctors.phoneno',
                                        'specialities.name'
                                    ]);

                                //dd($doctorsdata);

         return view('dashboard.admin.doctors',['SpecialityList' => $datas,'DoctorsList' => $doctorsdata]);
         //return view('dashboard.admin.doctors',['collections' => $datas]);
    }


    public function patientlist(){

        //$datas = Speciality::all();

        //dd($datas);

         $datas = Speciality::all();

         $doctorsdata = Patient::all();

                                //dd($doctorsdata);

         return view('dashboard.admin.home',['SpecialityList' => $datas,'DoctorsList' => $doctorsdata]);
         //return view('dashboard.admin.doctors',['collections' => $datas]);
    }

    public function usergrid(){

         $datas = Speciality::all();

         $doctorsdata = Patient::all();

                                //dd($doctorsdata);

         return view('dashboard.admin.usersgrid',['SpecialityList' => $datas,'DoctorsList' => $doctorsdata]);
         //return view('dashboard.admin.doctors',['collections' => $datas]);
    }

    // Generate PDF
    public function createPDF() {
        // retreive all records from db
        $data = patient::all();
        
        // share data to view
        // view()->share('patientlists',$data);

        // view('dashboard.admin.pdf_view',['data' => $data]);
       
        view()->share('dashboard.admin.pdf_view',$data);

        $pdf = PDF::loadView('dashboard.admin.pdf_view', ['data' => $data]);
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
      }

    // Generate PDF
    public function createsinglePDF($id) {
        // retreive all records from db
        $data = patient::find($id);
        // dd($id); 
        // share data to view
        // view()->share('patientlists',$data);

        // view('dashboard.admin.pdf_view',['data' => $data]);
       
        view()->share('dashboard.admin.singlepdf_view',$data);

        $pdf = PDF::loadView('dashboard.admin.singlepdf_view', ['singledata' => $data]);
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
      }

    
      public function createdoctor(Request $request){
        
        $request -> validate([
            'speciality' => "required|exists:specialities,id",
            'name' => "required|min:4|max:50",
            'name' => "regex:/^[a-zA-Z ]*$/",
            'email' => "required|email|unique:doctors,email",
            'phoneno' => "required|numeric|min:10",
            'phoneno' => "min:10",
        ],[
            'name.regex' => $request->name." is invalid only letters and space is allowed.",
        ]);
        
        //dd($request);

        $current_adminid = auth::guard('admin')->user()->id;

        $add_doctors = new Doctor;
        
        $add_doctors->name = $request->name;
        $add_doctors->email = $request->email;
        $add_doctors->phoneno = $request->phoneno;
        $add_doctors->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $add_doctors->specialityid = $request->speciality;
        $add_doctors->adminid = $current_adminid;

        $add_doctors -> save();

        if($add_doctors){
            return redirect()->route('admin.doctors')->with('success','Doctor Added Successfully');
        }else{
            return redirect()->route('admin.doctors')->with('danger','Sorry Doctor is not cretaed , try again later');
        }



    }



    public function updateuser(Request  $request){
        //dd($request);
        $request -> validate([
            'name' => "required|regex:/^[a-zA-Z ]*$/|min:4|max:50",
            'phoneno' => "required|numeric|min:10",
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


        $current_patientid = $request->id;

        $update_patient_basicinformation =  Patient::find($current_patientid);

        $update_patient_basicinformation -> name =  $request->name;
        $update_patient_basicinformation -> phoneno =  $request->phoneno;
        $update_patient_basicinformation -> address =  $request->shipaddress;
        $update_patient_basicinformation -> state =  $request->state;
        $update_patient_basicinformation -> city =  $request->city;
        $update_patient_basicinformation -> zipcode =  $request->pincode;
        $update_patient_basicinformation -> country =  $request->country;
        $update_patient_basicinformation -> save();
        
        if($update_patient_basicinformation){
            return  redirect()->back()->with('success','User Information updated successfully');
        }else{
            return  redirect()->back()->with('fail','Sorry , User Basic Information not updated, try again later');
        }
        
    
    }

    public function deleteuser(Request $request){
        $request -> validate([
            'id' => "required|exists:patients,id",
        ],[
            'id.exists' => 'User Id Does not exist in the database',
        ]);        

        $image = Patient::find($request->id);

            $deletespeciality = Patient::find($request->id);

        $deletespeciality->delete();
    
        if($deletespeciality){
            return  redirect()->back()->with('success','User is removed successfully');
        }else{
            return  redirect()->back()->with('fail','User is not removed , try again later');
        }

    }
    


       
}
