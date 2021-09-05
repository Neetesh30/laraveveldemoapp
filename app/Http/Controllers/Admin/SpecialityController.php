<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Speciality;
use Illuminate\Support\Facades\Auth;



class SpecialityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){

        $datas = Speciality::all();

        //dd($datas);

        //Route::view('dashboard.admin.speciality')->name('index');
            //dd($datas);
         return view('dashboard.admin.speciality',['collections' => $datas]);
    }
    
    public function createspeciality(Request $request){
        $request -> validate([
                'name' => "required|unique:specialities,name|alpha|min:4|max:20",
                'image' => "required|image|mimes:jpg,png|max:512",
        ],[
            'name.unique' => $request->name . ' speciality is already available.',
            'image.required' => 'Image Is required.',
        ]);

        $current_adminid = auth::guard('admin')->user()->id;

        $request ->input();

        $imageName = 'speciality_'.$request->name."_".time().'.'.$request->file('image')->extension();  

        $request->file('image')->move(public_path('admin/assets/img/speciality'), $imageName);

        $add_speciality = new Speciality;
        
        $add_speciality->name = $request->name;
        $add_speciality->imagepath = $imageName;
        $add_speciality->adminid = $current_adminid;

        $add_speciality -> save();

        if($imageName && $add_speciality){
            return redirect()->route('admin.speciality')->with('success','Speciality Created Successfully');
        }else{
            return redirect()->route('admin.speciality')->with('danger','Sorry speciality is not cretaed , try again later');
        }

        //dd($request);
    }

    public function updatespeciality(Request $request){
        $request -> validate([
            'name' => "required|alpha|min:4|max:10",
            'image' => "image|mimes:jpg,png|max:512",
         ]);

        $current_adminid = auth::guard('admin')->user()->id;

        $update_speciality_id = $request->id;
        $update_speciality_name = $request->name;

        if ($request->has('image')) {
            //echo "yes image request";

            $image = Speciality::find($request->id);

            $delteimage = unlink(public_path("admin/assets/img/speciality/".$image->imagepath));

            if($delteimage){
                //echo "Image Removed Successfully from the specialty folder ";

                $request ->input();

                $imageName = 'speciality_'.$request->name."_".time().'.'.$request->file('image')->extension();  

                $request->file('image')->move(public_path('admin/assets/img/speciality'), $imageName);


            }else{
                //echo "Soryy Image not removed from the folderSuccessfully";
            }


        }else{
            //echo "no  image request";
        }

        //dd($request);
        
        $update_speciality =  Speciality::findOrFail($update_speciality_id);
        
        $update_speciality -> name =  $request->name;

        if($imageName){
            $update_speciality -> imagepath =  $imageName;
        }

        $update_speciality -> adminid =  $current_adminid;
        $update_speciality -> save();
        
        if($update_speciality){
            return  redirect()->route('admin.speciality')->with('success','Speciality updated successfully');
        }else{
            return  redirect()->route('admin.speciality')->with('fail','Speciality update failed, try again later');
        }

    
    }


    public function deletespeciality(Request $request){
        $request -> validate([
            'id' => "required|exists:specialities,id",
        ],[
            'id.exists' => 'Speciality Id Does not exist in the database',
        ]);        

        $image = Speciality::find($request->id);

        $delteimage = unlink(public_path("admin/assets/img/speciality/".$image->imagepath));

        if($delteimage){
            //echo "Image Removed Successfully from the specialty folder ";

            $deletespeciality = Speciality::find($request->id);

            $deletespeciality->delete();
     
            if($deletespeciality){
                return  redirect()->route('admin.speciality')->with('success','Speciality is removed successfully');
            }else{
                return  redirect()->route('admin.speciality')->with('fail','Speciality is not removed , try again later');
            }


        }else{
            //echo "Soryy Image not removed from the folderSuccessfully";
        }

    }


}
