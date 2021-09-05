<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Doctor;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use App\Models\Scheduledocappt;
use Illuminate\Support\Str;



class AptScheduleController extends Controller
{
   

    public function index(){

        $scheduledatas = Scheduledocappt::where('dayoftheweek','sunday')
        ->where('doctorid',$current_doctorid = auth::guard('doctor')->user()->id)
        ->get();

         //dd($scheduledatas);

         $adminappdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
         ->where('id','1')
         ->get([
                 'appname',
                 'applogoimagepath',
                 'applogofaviconimagepath',
                 'app_contactno',
             ]);

         return view('dashboard.doctor.schedule-timings',['schedulecollections' => $scheduledatas,'adminappdatas'=>$adminappdatas]);
    }
    
    public function sunday(){
        $scheduledatas = Scheduledocappt::where('dayoftheweek','sunday')
                                        ->where('doctorid',$current_doctorid = auth::guard('doctor')->user()->id)
                                        ->get();
       
        //dd($scheduledatas);

        
        $adminappdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);

        return view('dashboard.doctor.schedule-timings',['schedulecollections' => $scheduledatas,'adminappdatas'=>$adminappdatas]);
        //code...

    }

    public function monday(){
        
        $scheduledatas = Scheduledocappt::where('dayoftheweek','monday')
                                        ->where('doctorid',$current_doctorid = auth::guard('doctor')->user()->id)
                                        ->get();
       
        //dd($scheduledatas);
        
        $adminappdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);

        return view('dashboard.doctor.schedule-timings',['schedulecollections' => $scheduledatas,'adminappdatas'=>$adminappdatas]);
        //code...

    }
    
    public function tuesday(){
        
        $scheduledatas = Scheduledocappt::where('dayoftheweek','tuesday')
                                        ->where('doctorid',$current_doctorid = auth::guard('doctor')->user()->id)
                                        ->get();
       
        //dd($scheduledatas);
        
        $adminappdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);
            
        return view('dashboard.doctor.schedule-timings',['schedulecollections' => $scheduledatas,'adminappdatas'=>$adminappdatas]);
        //code...

    }

    public function wednesday(){
        
        $scheduledatas = Scheduledocappt::where('dayoftheweek','wednesday')
                                        ->where('doctorid',$current_doctorid = auth::guard('doctor')->user()->id)
                                        ->get();
       
        //dd($scheduledatas);
        
        $adminappdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);

        return view('dashboard.doctor.schedule-timings',['schedulecollections' => $scheduledatas,'adminappdatas'=>$adminappdatas]);
        //code...

    }

    public function thursday(){
        
        $scheduledatas = Scheduledocappt::where('dayoftheweek','thursday')
                                        ->where('doctorid',$current_doctorid = auth::guard('doctor')->user()->id)
                                        ->get();
       
        //dd($scheduledatas);

        
        $adminappdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);

        return view('dashboard.doctor.schedule-timings',['schedulecollections' => $scheduledatas,'adminappdatas'=>$adminappdatas]);
        //code...

    }

    public function friday(){
        
        $scheduledatas = Scheduledocappt::where('dayoftheweek','friday')
                                        ->where('doctorid',$current_doctorid = auth::guard('doctor')->user()->id)
                                        ->get();
       
        //dd($scheduledatas);
        
        $adminappdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);

        return view('dashboard.doctor.schedule-timings',['schedulecollections' => $scheduledatas,'adminappdatas'=>$adminappdata]);
        //code...

    }

    public function saturday(){
        
        $scheduledatas = Scheduledocappt::where('dayoftheweek','saturday')
                                        ->where('doctorid',$current_doctorid = auth::guard('doctor')->user()->id)
                                        ->get();
       
        //dd($scheduledatas);
        
        $adminappdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);

        return view('dashboard.doctor.schedule-timings',['schedulecollections' => $scheduledatas,'adminappdatas'=>$adminappdatas]);
        //code...

    }


    public function createSchedule(Request $request){
       // dd($request);
        $request->validate([
            'slotduration' => 'required|numeric',
            'dayoftheweek' => [
                'required',
                Rule::in(['sunday','monday','tuesday','wednesday','thursday','friday','saturday']),
            ],
            'starttime' => 'required|date_format:H:i',
            'endtime' => 'required|date_format:H:i',
        ]);
        
        
        $start_time = strtotime($request->starttime);
         $end_time = strtotime($request->endtime);

        if($start_time == $end_time){
            return redirect()->route('doctor.schedule-timings')->with('fail','Sorry Start and end time cannot be the same, Please try again later');
        }elseif($start_time >= $end_time){
            
            return redirect()->route('doctor.schedule-timings')->with('fail','Sorry End time cannot be less than Start time , Please try again later');
        }

       // dd($request);

        $slot = strtotime(date('H:i',$start_time) . '+'.$request->slotduration.' minutes');

            $data = [];

            for ($i=0; $slot <= $end_time; $i++) { 

                $data[$i] = [ 
                    'start' => date('h:i a', $start_time),
                    'end' => date('h:i a', $slot),
                ];

                
                $start_time = $slot;
                $slot = strtotime(date('H:i',$start_time) . '+'.$request->slotduration.' minutes');
            }

            $current_doctorid = auth::guard('doctor')->user()->id;

            $insertschedule = implode(',', array_map(
                function ($v, $k) {
                    if(is_array($v)){
                        return implode(' - ', $v);
                    }else{
                        return $k.'dd'.$v;
                    }
                }, 
                $data, 
                array_keys($data)
            ));

          
            $cats = explode(",", $insertschedule);
            foreach($cats as $cat =>$key) {
                
                $add_schedule = new Scheduledocappt;

                $add_schedule->doctorid = $current_doctorid;
                $add_schedule->dayoftheweek = $request->dayoftheweek;
                $add_schedule->slotduration = $request->slotduration;
                $add_schedule->starttime = $key;
                $add_schedule->endtime = $key;
                $add_schedule -> save();
            }
            

            
            //dd($data);  
            
            if($add_schedule){
                return  redirect()->back()->with('success','Doctor Schedule Created Successfully');
            }else{
                return  redirect()->back()->with('fail','Sorry Doctor Schedule was not created, Please try again later');
            }

    }

    public function removeSchedule(REQUEST $request){

        $request->validate([
            'scheduleid' => 'required|numeric|exists:scheduledocappts,id',
            'rmvslottime' => 'required',
            'rmvslottime' => 'regex:/^[ A-Za-z0-9()[\],:-]*$/',
        ],[
            'scheduleid.numeric' => $request->rmvslottime .' id is invalid ',
            'scheduleid.exists' => $request->rmvslottime .' id does not exist ',
            'scheduleid.required ' => $request->rmvslottime .' is required ',
            'rmvslottime.required ' => $request->rmvslottime .' is required ',
            'rmvslottime.regex ' => $request->rmvslottime .' format is invalid ',
        ]);

        
        $update_schedule =  Scheduledocappt::findOrFail($request->scheduleid);
        
        if($request->rmvlastslottime){
            if($request->rmvlastcount == '1-1'){
                
                $update_schedule ->delete();
     
                if($update_schedule){
                    return  redirect()->back()->with('success','Doctor Schedule Deleted Successfully.');
                }else{
                    return  redirect()->back()->with('fail','Sorry Doctor Schedule was not deleted, Please try again later.');
                }

            }else{

                $removelast = ','.$request->rmvlastslottime;
            }
            $replacedschedule = Str::of($update_schedule->starttime)->replace($removelast, '');
        }else{
            //no code
            $replacedschedule = Str::of($update_schedule->starttime)->replace($request->rmvslottime, '');
        } 
        
        
        //dd($request);

        $update_schedule -> starttime =  $replacedschedule;

        $update_schedule -> save();

        if($update_schedule){
            return  redirect()->back()->with('success','Doctor Schedule Updated Successfully');
        }else{
            return  redirect()->back()->with('fail','Sorry Doctor Schedule was not updated, Please try again later');
        }

    }
}
