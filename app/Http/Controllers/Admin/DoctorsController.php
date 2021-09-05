<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Speciality;
use App\Models\Doctor;
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


       
}
