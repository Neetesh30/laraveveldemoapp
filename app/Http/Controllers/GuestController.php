<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;

class GuestController extends Controller
{
    public function index()
    {

        $guestdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);

        return view('dashboard.admin.login',['guestdatas'=>$guestdatas]);
    }

    public function welcome()
    {
        $guestdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);

        return view('welcome',['guestdatas'=>$guestdatas]);
    }

    public function patientloginindex()
    {

        $guestdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);

        return view('dashboard.patient.login',['guestdatas'=>$guestdatas]);
    }

    public function patientregisterindex()
    {

        $guestdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);

        return view('dashboard.patient.register',['guestdatas'=>$guestdatas]);
    }

    public function doctorloginindex()
    {

        $guestdatas = Admin::select('appname','applogoimagepath','applogofaviconimagepath','app_contactno')
        ->where('id','1')
        ->get([
                'appname',
                'applogoimagepath',
                'applogofaviconimagepath',
                'app_contactno',
            ]);

        return view('dashboard.doctor.login',['guestdatas'=>$guestdatas]);
    }




}
