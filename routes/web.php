<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\Admin\DoctorsController;
use App\Http\Controllers\Patient\PatientController;
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

Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','preventbackbutton'])->group(function(){
          Route::GET('/login',[GuestController::class,'index'])->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','preventbackbutton'])->group(function(){
        Route::GET('/home',[DoctorsController::class,'patientlist'])->name('home');
        Route::view('/profile','dashboard.admin.profile')->name('profile');
        Route::view('/settings','dashboard.admin.settings')->name('settings');
        Route::GET('/speciality',[SpecialityController::class,'index'])->name('speciality');
        Route::GET('/doctors',[DoctorsController::class,'index'])->name('doctors');
        Route::GET('/usersgrid',[DoctorsController::class,'usergrid'])->name('doctors');
        Route::GET('/singleuserpdf/{id}',[DoctorsController::class,'createsinglePDF']);
        Route::GET('/pdf', [DoctorsController::class, 'createPDF']);

        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
        Route::post('/imageupdate',[AdminController::class,'imageupdate'])->name('imageupdate');
        Route::post('/profileupdate',[AdminController::class,'profileupdate'])->name('profileupdate');
        Route::post('/changeprofileoldnewpassword',[AdminController::class,'changeprofileoldnewpassword'])->name('changeprofileoldnewpassword');
        Route::post('/updateuser',[DoctorsController::class,'updateuser'])->name('updateuser');
        Route::post('/deleteuser',[DoctorsController::class,'deleteuser'])->name('deleteuser');
        Route::post('/deletespeciality',[SpecialityController::class,'deletespeciality'])->name('deletespeciality');
        Route::post('/createdoctor',[DoctorsController::class,'createdoctor'])->name('createdoctor');
        Route::post('/updateSettings',[AdminController::class,'updateSettings'])->name('updateSettings');
    });

});

// User  MVC

Route::prefix('patient')->name('patient.')->group(function(){
    Route::middleware(['guest:patient','preventbackbutton','XssSanitizer'])->group(function(){
        Route::GET('/login',[GuestController::class,'patientloginindex'])->name('login');
        Route::GET('/register',[GuestController::class,'patientregisterindex'])->name('register');
        Route::post('/createPatient',[PatientController::class,'createPatient'])->name('createPatient');
        Route::post('/check',[PatientController::class,'check'])->name('check');
    });
    
    Route::middleware(['auth:patient','preventbackbutton','XssSanitizer','verified'])->group(function(){
        Route::GET('/home',[PatientController::class,'index'])->name('home');
        Route::post('/logout',[PatientController::class,'logout'])->name('logout');
        Route::GET('/profile',[PatientController::class,'patientprofile'])->name('profile');
        Route::GET('/changepassword',[PatientController::class,'changepassword'])->name('changepassword');
        Route::post('/imageupdate',[PatientController::class,'imageupdate'])->name('imageupdate');
        Route::post('/updateBasicInformation',[PatientController::class,'updateBasicInformation'])->name('updateBasicInformation');
        Route::post('/updateAddressInformation',[PatientController::class,'updateAddressInformation'])->name('updateAddressInformation');
        Route::post('/updatepassword',[PatientController::class,'updatePassword'])->name('updatepassword');
        Route::GET('/checkout',[CheckoutController::class,'checkOut'])->name('checkout');
    });
    
});
