<?php

namespace App\Http\Controllers\DoctorScheduleAndBook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Speciality;
use App\Models\Doctor;
use App\Models\Admin;
use App\Models\Scheduledocappt;
use App\Models\BookedAppointment;

class DoctorSearchController extends Controller
{
    public function search(Request $request){
        //dd($request->gender_type);
        //dd($_GET['gender_type']);

        $gender_type = ['male','female'];
        $select_specialist = ['2','3','4','6','7'];

        if($request->gender_type){
            $gender_type = $request->gender_type;
        }
        
        if($request->select_specialist){
            $select_specialist = $request->select_specialist;
        }
        
        $doctorsdata = Doctor::join('specialities','specialities.id', '=', 'doctors.specialityid')
                                ->where('doctors.status','=' ,'active')
                                ->whereIn('doctors.gender',$gender_type)
                                ->whereIn('specialities.id',$select_specialist)
                                ->paginate(5, [
                                'doctors.id',
                                'doctors.name as aliasdoctorname',
                                'doctors.email',
                                'doctors.imagepath',
                                'doctors.status',
                                'doctors.phoneno',
                                'doctors.gender',
                                'doctors.city',
                                'doctors.country',
                                'doctors.clinic_imagepath',
                                'doctors.services',
                                'doctors.doctor_fees',
                                'specialities.name',
                                'specialities.imagepath as aliaspecialityimage'
                            ]);
                             

        $Count = $doctorsdata->count();

        $specialitylist = Speciality::select('specialities.name','specialities.id as specialityid')
                                        ->get('specialities.name');

        $adminappdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);                               

        return view('welcome',['DoctorsList' => $doctorsdata,
                                        'rowcount' => $Count,'specialitylist'=>$specialitylist,
                                        'adminappdatas'=>$adminappdatas
                                    ]);
    }

    public function bookdoctorslot($id){

        $doctor_id = $id;

        $bookingdoctordatas = Doctor::select('doctors.name','doctors.imagepath','doctors.city','doctors.country')
        ->where('doctors.id',$doctor_id )
        ->get([
            'doctors.id',
            'doctors.names',
            'doctors.imagepath',
            'doctors.city',
            'doctors.country',
        ]);
        
        $sundaybookingdatas = Scheduledocappt::
        join('doctors','doctors.id', '=', 'scheduledocappts.doctorid')
        //->join('booked_appointments','booked_appointments.doctorid', '=', 'scheduledocappts.doctorid')
        ->where('doctors.id',$doctor_id)
        ->where('scheduledocappts.dayoftheweek','sunday' )
        //->where('booked_appointments.doctorid',$doctor_id )
        //->where('booked_appointments.appointment_dayoftheweek','sunday' )
        ->get([
            'scheduledocappts.id',
            'scheduledocappts.dayoftheweek',
            'scheduledocappts.starttime',
            'scheduledocappts.booking_status',
            'scheduledocappts.booking_date',
        ]);

        $bookeedslots = BookedAppointment::
        join('scheduledocappts','scheduledocappts.doctorid', '=', 'booked_appointments.doctorid')
        ->where('booked_appointments.doctorid',$doctor_id)
        ->get([
            'booked_appointments.appointment_date',
            'booked_appointments.appointment_time',
            'booked_appointments.appointment_dayoftheweek',
        ]);

        $sundayCount = $sundaybookingdatas->count();


        $mondaybookingdatas = Scheduledocappt::join('doctors','doctors.id', '=', 'scheduledocappts.doctorid')
        ->where('doctors.id',$doctor_id)
        ->where('scheduledocappts.dayoftheweek','monday')
        ->get([
            'scheduledocappts.id',
            'scheduledocappts.dayoftheweek',
            'scheduledocappts.starttime',
            'scheduledocappts.booking_status',
            'scheduledocappts.booking_date',
        ]);

        $mondayCount = $mondaybookingdatas->count();


        $tuesdaybookingdatas = Scheduledocappt::join('doctors','doctors.id', '=', 'scheduledocappts.doctorid')
        ->where('doctors.id',$doctor_id )
        ->where('scheduledocappts.dayoftheweek','tuesday' )
        ->get([
            'scheduledocappts.id',
            'scheduledocappts.dayoftheweek',
            'scheduledocappts.starttime',
            'scheduledocappts.booking_status',
            'scheduledocappts.booking_date',
        ]);

        $tuesdayCount = $tuesdaybookingdatas->count();

        $wednesdaybookingdatas = Scheduledocappt::join('doctors','doctors.id', '=', 'scheduledocappts.doctorid')
        ->where('doctors.id',$doctor_id )
        ->where('scheduledocappts.dayoftheweek','wednesday' )
        ->get([
            'scheduledocappts.id',
            'scheduledocappts.dayoftheweek',
            'scheduledocappts.starttime',
            'scheduledocappts.booking_status',
            'scheduledocappts.booking_date',
        ]);

        $wednesdayCount = $wednesdaybookingdatas->count();

        $thursdaybookingdatas = Scheduledocappt::join('doctors','doctors.id', '=', 'scheduledocappts.doctorid')
        ->where('doctors.id',$doctor_id )
        ->where('scheduledocappts.dayoftheweek','thursday' )
        ->get([
            'scheduledocappts.id',
            'scheduledocappts.dayoftheweek',
            'scheduledocappts.starttime',
            'scheduledocappts.booking_status',
            'scheduledocappts.booking_date',
        ]);

        $thursdayCount = $thursdaybookingdatas->count();

        $fridaybookingdatas = Scheduledocappt::join('doctors','doctors.id', '=', 'scheduledocappts.doctorid')
        ->where('doctors.id',$doctor_id )
        ->where('scheduledocappts.dayoftheweek','friday' )
        ->get([
            'scheduledocappts.id',
            'scheduledocappts.dayoftheweek',
            'scheduledocappts.starttime',
            'scheduledocappts.booking_status',
            'scheduledocappts.booking_date',
        ]);

        $fridayCount = $fridaybookingdatas->count();

        $saturdaybookingdatas = Scheduledocappt::join('doctors','doctors.id', '=', 'scheduledocappts.doctorid')
        ->where('doctors.id',$doctor_id )
        ->where('scheduledocappts.dayoftheweek','saturday' )
        ->get([
            'scheduledocappts.id',
            'scheduledocappts.dayoftheweek',
            'scheduledocappts.starttime',
            'scheduledocappts.booking_status',
            'scheduledocappts.booking_date',
        ]);

        $saturdayCount = $sundaybookingdatas->count();

         //dd($bookingdatas);

         
        $adminappdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);                               
        
        return view('dashboard.DoctorScheduleAndBook.booking',[
                                                                'bookingdoctordatas' => $bookingdoctordatas,
                                                                'sundaybookingslots' => $sundaybookingdatas,
                                                                'mondaybookingslots' => $mondaybookingdatas,
                                                                'tuesdaybookingslots' => $tuesdaybookingdatas,
                                                                'wednesdaybookingslots' => $wednesdaybookingdatas,
                                                                'thursdaybookingslots' => $thursdaybookingdatas,
                                                                'fridaybookingslots' => $fridaybookingdatas,
                                                                'saturdaybookingslots' => $saturdaybookingdatas,
                                                                'sundayCount' => $sundayCount,
                                                                'mondayCount' => $mondayCount,
                                                                'tuesdayCount' => $tuesdayCount,
                                                                'wednesdayCount' => $wednesdayCount,
                                                                'thursdayCount' => $thursdayCount,
                                                                'fridayCount' => $fridayCount,
                                                                'saturdayCount' => $saturdayCount,
                                                                'bookeedslots' => $bookeedslots,
                                                                'adminappdatas'=>$adminappdatas
                                                            ]);
    }
}
