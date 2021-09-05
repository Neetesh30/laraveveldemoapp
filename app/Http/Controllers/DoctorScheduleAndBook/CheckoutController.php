<?php

namespace App\Http\Controllers\DoctorScheduleAndBook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Admin;
use App\Models\scheduledocappt;
use App\Models\BookedAppointment;
use App\Models\payment_record;

class CheckoutController extends Controller
{
    public function checkOut(Request $request){
        //dd($request);
        $request -> validate([
            'bookingslot' => 'required|numeric|exists:scheduledocappts,id',
       //     'bookingddata' => "required|regex:/^[0-9-]*$/",
        ],[
            'bookingslot.numeric' => 'The bookingslot selected is invalid, please select from the booking list.',
            'bookingslot.exists' => 'The bookingslot does not exist',
        ]);


        if(scheduledocappt::where('id',$request->bookingslot)->exists()){
        }
        else{
            redirect()->back()->with('fail','booking slot does not exist');
        }


         $adminappdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);                               


        $checkoutdata = Doctor::join('scheduledocappts','doctorid', '=', 'doctors.id')
                                ->where('scheduledocappts.id','=' ,$request->bookingslot)
                                ->where('scheduledocappts.booking_status','=' ,'unbooked')
                                ->where('doctors.status','=' ,'active')
                                ->get([
                                'doctors.id',
                                'doctors.name',
                                'doctors.email',
                                'doctors.imagepath',
                                'doctors.status',
                                'doctors.phoneno',
                                'doctors.gender',
                                'doctors.doctor_fees',
                                'scheduledocappts.dayoftheweek',
                                'scheduledocappts.slotduration',
                                'scheduledocappts.starttime',
                                'scheduledocappts.booking_status',
                            ]);

        $Count = $checkoutdata->count();

        if($Count == 0){
            return redirect()->back()->with('fail','This booking slot is already booked , please select fromt the list');
        }else{
            return view('dashboard.doctorscheduleandbook.checkout',['checkoutdata' => $checkoutdata,
                                                          'rowcount' => $Count,
                                                          'bookeddate' => $request->bookingddata,
                                                          'adminappdatas'=>$adminappdatas
                                                        ]);
        }
        


    }

    public function paymentConfirmation(Request $request){
        
        $request -> validate([
            'bookingslot' => "required|numeric|exists:scheduledocappts,id",
            'fullname' => "required|regex:/^[a-zA-Z ]*$/|min:4|max:50",
            'email' => "required|email|exists:patients,email",
            'phoneno' => "required|numeric|exists:patients,phoneno|min:10",
            'agreetnc' => "required",
             ],[
                'fullname.regex' => 'Full Name can have letters only',
                'email.exists' => 'Email doesnot exists',
                'phoneno.exists' => 'Phone Number doesnot exists',
            ]);
            
            
            $bookingdoctordatas = scheduledocappt::join('doctors','doctors.id', '=', 'scheduledocappts.doctorid')
            ->where('scheduledocappts.id', $request->bookingslot)
            ->get([
                'scheduledocappts.id',
                'scheduledocappts.dayoftheweek',
                'scheduledocappts.starttime',
                'scheduledocappts.booking_status',
                'doctors.id as doctorsid',
            ]);
            
            foreach ($bookingdoctordatas as $bookingdoctordata) {
                 $bookingdoctordata->dayoftheweek;
                 $bookingdoctordata->starttime;
                 $bookingdoctordata->doctorsid;
            }
                        
            //echo now();

            //dd($request->bookingslot);
            
            $add_appointment = new BookedAppointment;
            $add_appointment->patientid = auth::guard('patient')->user()->id ;
            $add_appointment->doctorid = $bookingdoctordata->doctorsid;
            $add_appointment->appointment_date = $request->bookingdate;
            $add_appointment->appointment_time = $bookingdoctordata->starttime;
            $add_appointment->appointment_dayoftheweek = $bookingdoctordata->dayoftheweek;
            $add_appointment->appointment_purpose = 'I have fever';
            $add_appointment->appointment_type = 'Walk In';
            $add_appointment->appointment_status = 'Confirmed';
            $add_appointment->payment_amount = 100;
            $add_appointment->payment_paidon = now("Asia/Kolkata");
            $add_appointment->payment_status = 'paid';
            $add_appointment -> save();


            if($add_appointment){

                $update_scheduledocappt_slot = scheduledocappt::find($request->bookingslot);
                $update_scheduledocappt_slot -> booking_status = 'booked';
                $update_scheduledocappt_slot -> booking_date = $request->bookingdate;
                $update_scheduledocappt_slot -> save();

                $payment_record = new payment_record;
                $payment_record->patientid = auth::guard('patient')->user()->id;
                $payment_record->payment_amount = 100;
                $payment_record->payment_paidon = now("Asia/Kolkata");
                $payment_record->payment_method = "Debit Card";
                $payment_record -> save();

                //echo "all records in database saved";

                return redirect()->route('patient.home')->with('success','Appointment Slot was booked successfully');
            }else{
                return redirect()->route('patient.home')->with('fail','Sorry Your Appointment Slot was not booked, please try after sometime');
            }



    }
}
