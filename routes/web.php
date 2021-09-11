<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\Admin\DoctorsController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Doctor\AptScheduleController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\DoctorScheduleAndBook\DoctorSearchController;
use App\Http\Controllers\DoctorScheduleAndBook\CheckoutController;
use App\Http\Controllers\GuestController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::GET('/',[GuestController::class,'welcome'])->name('welcome');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','preventbackbutton'])->group(function(){
        //   Route::view('/login','dashboard.admin.login')->name('login');
          Route::GET('/login',[GuestController::class,'index'])->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','preventbackbutton'])->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::view('/profile','dashboard.admin.profile')->name('profile');
        Route::view('/settings','dashboard.admin.settings')->name('settings');
        Route::GET('/speciality',[SpecialityController::class,'index'])->name('speciality');
        Route::GET('/doctors',[DoctorsController::class,'index'])->name('doctors');
        //Route::view('/speciality','dashboard.admin.speciality')->name('speciality');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
        Route::post('/imageupdate',[AdminController::class,'imageupdate'])->name('imageupdate');
        Route::post('/profileupdate',[AdminController::class,'profileupdate'])->name('profileupdate');
        Route::post('/changeprofileoldnewpassword',[AdminController::class,'changeprofileoldnewpassword'])->name('changeprofileoldnewpassword');
        Route::post('/createspeciality',[SpecialityController::class,'createspeciality'])->name('createspeciality');
        Route::post('/updatespeciality',[SpecialityController::class,'updatespeciality'])->name('updatespeciality');
        Route::post('/deletespeciality',[SpecialityController::class,'deletespeciality'])->name('deletespeciality');
        Route::post('/createdoctor',[DoctorsController::class,'createdoctor'])->name('createdoctor');
        Route::post('/updateSettings',[AdminController::class,'updateSettings'])->name('updateSettings');
    });

});

// Doctor MVC
Route::prefix('doctor')->name('doctor.')->group(function(){
    Route::middleware(['guest:doctor','preventbackbutton','XssSanitizer'])->group(function(){
        // Route::view('/login','dashboard.doctor.login')->name('login');
        // Route::view('/login','dashboard.doctor.login')->name('login');
        Route::GET('/login',[GuestController::class,'doctorloginindex'])->name('login');
        Route::post('/check',[DoctorController::class,'check'])->name('check');
    });

  Route::middleware(['auth:doctor','preventbackbutton','XssSanitizer'])->group(function(){
    //Route::view('/home','dashboard.doctor.home')->name('home');
    Route::GET('/home',[DoctorController::class,'index'])->name('home');
    Route::post('/logout',[DoctorController::class,'logout'])->name('logout');
    // Route::view('/profile','dashboard.doctor.profile')->name('profile');
    // Route::view('/profile','dashboard.doctor.profile')->name('profile');
    // Route::view('/profile','dashboard.doctor.profile')->name('profile');
    Route::GET('/profile',[DoctorController::class,'doctorprofile'])->name('profile');
    //Route::view('/schedule-timings','dashboard.doctor.schedule-timings')->name('schedule-timings');
    Route::get('/schedule-timings',[AptScheduleController::class,'index'])->name('schedule-timings');
    Route::get('/schedule-timings/slot-sunday',[AptScheduleController::class,'sunday'])->name('/schedule-timings/slot-sunday');
    Route::get('/schedule-timings/slot-monday',[AptScheduleController::class,'monday'])->name('/schedule-timings/slot-monday');
    Route::get('/schedule-timings/slot-tuesday',[AptScheduleController::class,'tuesday'])->name('/schedule-timings/slot-tuesday');
    Route::get('/schedule-timings/slot-wednesday',[AptScheduleController::class,'wednesday'])->name('/schedule-timings/slot-wednesday');
    Route::get('/schedule-timings/slot-thursday',[AptScheduleController::class,'thursday'])->name('/schedule-timings/slot-thursday');
    Route::get('/schedule-timings/slot-friday',[AptScheduleController::class,'friday'])->name('/schedule-timings/slot-friday');
    Route::get('/schedule-timings/slot-saturday',[AptScheduleController::class,'saturday'])->name('/schedule-timings/slot-saturday');
    Route::post('/imageupdate',[DoctorController::class,'imageupdate'])->name('imageupdate');
    Route::post('/clinicimageupdate',[DoctorController::class,'clinicimageupdate'])->name('clinicimageupdate');
    Route::post('/removeclinicImage',[DoctorController::class,'removeclinicImage'])->name('removeclinicImage');
    Route::post('/updateAddress',[DoctorController::class,'updateAddress'])->name('updateAddress');
    Route::post('/updateFees',[DoctorController::class,'updateFees'])->name('updateFees');
    Route::post('/serviceSpecializationupdate',[DoctorController::class,'serviceSpecializationupdate'])->name('serviceSpecializationupdate');
    Route::post('/eduUpdate',[DoctorController::class,'eduUpdate'])->name('eduUpdate');
    Route::post('/ExperienceUpdate',[DoctorController::class,'ExperienceUpdate'])->name('ExperienceUpdate');
    Route::post('/updateAward',[DoctorController::class,'updateAward'])->name('updateAward');
    Route::post('/membershipUpdate',[DoctorController::class,'membershipUpdate'])->name('membershipUpdate');
    Route::post('/updateBasicInformation',[DoctorController::class,'updateBasicInformation'])->name('updateBasicInformation');
    Route::post('/updateAboutMe',[DoctorController::class,'updateAboutMe'])->name('updateAboutMe');
    Route::post('/updateClinicinfo',[DoctorController::class,'updateClinicinfo'])->name('updateClinicinfo');
    Route::post('/createSchedule',[AptScheduleController::class,'createSchedule'])->name('createSchedule');
    Route::post('/removeSchedule',[AptScheduleController::class,'removeSchedule'])->name('removeSchedule');
});

});

// Patient MVC

Route::prefix('patient')->name('patient.')->group(function(){
    Route::middleware(['guest:patient','preventbackbutton','XssSanitizer'])->group(function(){
        // Route::view('/login','dashboard.patient.login')->name('login');
        // Route::view('/register','dashboard.patient.register')->name('register');
        Route::GET('/login',[GuestController::class,'patientloginindex'])->name('login');
        Route::GET('/register',[GuestController::class,'patientregisterindex'])->name('register');
        Route::post('/createPatient',[PatientController::class,'createPatient'])->name('createPatient');
        Route::post('/check',[PatientController::class,'check'])->name('check');
    });
    
    Route::middleware(['auth:patient','preventbackbutton','XssSanitizer','verified'])->group(function(){
        Route::GET('/home',[PatientController::class,'index'])->name('home');
        Route::post('/logout',[PatientController::class,'logout'])->name('logout');
        // Route::view('/profile','dashboard.patient.profile')->name('profile');
        Route::GET('/profile',[PatientController::class,'patientprofile'])->name('profile');
        Route::GET('/changepassword',[PatientController::class,'changepassword'])->name('changepassword');
        // Route::view('/changepassword','dashboard.patient.changepassword')->name('changepassword');
        //Route::view('/searchdoctor','dashboard.patient.searchdoctor')->name('searchdoctor');
        Route::GET('/searchdoctor',[DoctorSearchController::class,'search'])->name('searchdoctor');
        Route::GET('/bookdoctorslot/{id}',[DoctorSearchController::class,'bookdoctorslot']);
        Route::post('/imageupdate',[PatientController::class,'imageupdate'])->name('imageupdate');
        Route::post('/updateBasicInformation',[PatientController::class,'updateBasicInformation'])->name('updateBasicInformation');
        Route::post('/updateAddressInformation',[PatientController::class,'updateAddressInformation'])->name('updateAddressInformation');
        Route::post('/updatepassword',[PatientController::class,'updatePassword'])->name('updatepassword');
        Route::GET('/checkout',[CheckoutController::class,'checkOut'])->name('checkout');
        Route::post('/payment',[CheckoutController::class,'paymentConfirmation'])->name('payment');
    });
    
});

// verify patient email registration

Route::get('/email/verify', function () {
    return view('patient.verify-email');
})->middleware('auth:patient')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    
    // dd($request);
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth:patient', 'throttle:6,1'])->name('verification.resend');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('patient/home');
})->middleware(['auth:patient', 'signed'])->name('verification.verify');