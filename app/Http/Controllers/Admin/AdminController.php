<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function check(Request $request){
        $request -> validate([
            "email" => 'required|email|exists:admins,email',
            "password" => 'required|min:4|max:10',
        ],[
            'email.exists' => 'Sorry , email id does not exist !!!'
        ]);

        //dd($request);

        $creds = $request->only('email','password');

        if(auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('admin.login')->with('fail','Your Credentials are wrong.');
        }

    }

    public function imageupdate(Request  $request){
        $request -> validate([
            'image' => 'required|image|mimes:jpg,png|max:512',
        ],[
            'image.required' => 'Image Is required.',
        ]);

        //dd($request);

        $request ->input();

        $imageName = 'admin_id_'.$request->adminid."_".time().'.'.$request->file('image')->extension();  

        $request->file('image')->move(public_path('admin/assets/img/admin'), $imageName);

        $updtadminid = $request->adminid;
        
        $update_admin_image =  Admin::find($updtadminid);
        
        $update_admin_image -> imagepath =  $imageName;
        
        $update_admin_image -> save();
        
        if($update_admin_image){
            return  redirect()->route('admin.profile')->with('success','Admin image uploaded successfully');
        }else{
            return  redirect()->route('admin.profile')->with('fail','Admin image failed, try again later');
        }
        
        //return redirect('admin.profile');
    }
    
    public function profileupdate(Request  $request){
        $request -> validate([
            'fullname' => 'required|min:4|alpha|max:20',
            'email' => 'required|email|exists:admins,email',
            'phoneno' => 'required|numeric',
        ],[
            'phoneno.required' => 'The Mobile Number is required.',
            'phoneno.numeric' => 'The Mobile Number must be a number.',
        ]);
        
        $updtadminid = $request->adminid;
        $updtadm_name = $request->fullname;
        $updtadm_phoneno = $request->phoneno;
        
        $update_admin_profile =  Admin::find($updtadminid);
        
        $update_admin_profile -> name =  $updtadm_name;
        $update_admin_profile -> phoneno =  $updtadm_phoneno;
        $update_admin_profile -> save();
        
        if($update_admin_profile){
            return  redirect()->route('admin.profile')->with('success','Admin profile uploaded successfully');
        }else{
            return  redirect()->route('admin.profile')->with('fail','Admin profile failed, try again later');
        }
    }
    
    public function changeprofileoldnewpassword(Request  $request){
        $request -> validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|alpha_dash|min:4|max:10',
            'cpassword' => 'required|alpha_dash|same:newpassword|min:4|max:10',
        ],[
            'phoneno.required' => 'The Mobile Number is required.',
            'cpassword.required' => 'Confirm Password Field is required.',
            'cpassword.same' => 'Confirm Password should be same as New Password.',
        ]);
        
        
        // $oldpassword = Hash::make($request->oldpassword);
        // echo $oldpassword;
        
        $admindata = Admin::select('password','id')->where('id', 1)->get();
        
        foreach ($admindata as $users) {
            $users->password;
        }
        
         $updtadminoldpassword = $request->oldpassword;
         $oldpassword = $users->password;
        
        //dd($request);
        
        if (Hash::check($updtadminoldpassword, $oldpassword)) {
            $updtadminid = $request->adminid;
            $updtadminnewpassword = $request->newpassword;
            
            $update_admin_password =  Admin::find($updtadminid);

            $update_admin_password -> password =  Hash::make($updtadminnewpassword);
            
            $update_admin_password -> save();
            
            if($update_admin_password){

                Auth::guard('admin')->logout();
                return  redirect()->route('admin.login')->with('success','Admin New password changed, login again with new password');

            }else{

                return  redirect()->route('admin.profile')->with('fail','Sorry , new password is not saved  , try again later');
            }
            
        }else{
            
            return  redirect()->route('admin.profile')->with('fail','Admin Old password does not match , try again later');
            
        }
        
        //dd($request);
        
        
    }

    public function updateSettings(Request  $request)
    {
        // dd($request);
        $request -> validate([
            'websiteName' => "required|regex:/^[ A-Za-z0-9()[\],-]*$/|min:5|max:50",
            'contactno' => "required|numeric",
            'websiteLogo' => 'image|mimes:jpg,png|max:512',
            'faviconLogo' => 'image|mimes:jpg,png|max:512',
        ]);

        $update_admin_settings = Admin::find(auth::guard('admin')->user()->id);

        
        if ($applogoimage = $request->file('websiteLogo')) {

            $applogoimage = 'admin_id_logo'.$request->adminid."_".time().'.'.$request->file('websiteLogo')->extension();  

            $request->file('websiteLogo')->move(public_path('admin/assets/img/'), $applogoimage);

        }else{
            $applogoimage = auth::guard('admin')->user()->applogoimagepath;
        }

        if ($faviconlogoimage = $request->file('faviconLogo')) {

            $faviconlogoimage = 'admin_id_favlogo'.$request->adminid."_".time().'.'.$request->file('faviconLogo')->extension();  

            $request->file('faviconLogo')->move(public_path('admin/assets/img/'), $faviconlogoimage);

        }else{
            $faviconlogoimage = auth::guard('admin')->user()->applogofaviconimagepath;
        }
          

        $update_admin_settings -> appname =  $request->websiteName;
        $update_admin_settings -> app_contactno =  $request->contactno;
        $update_admin_settings -> applogoimagepath =  $applogoimage;
        $update_admin_settings -> applogofaviconimagepath =  $faviconlogoimage;
        
        $update_admin_settings -> save();

        if($update_admin_settings){
            return  redirect()->route('admin.settings')->with('success','Settings saved successfully');
        }else{
            return  redirect()->route('admin.settings')->with('fail','Settings did not save , try again later');
        }


    }

    


    
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
