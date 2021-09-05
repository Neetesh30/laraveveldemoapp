<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedAppointment extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patientid',
        'doctorid',
        'appointment_date',
        'appointment_time',
        'appointment_dayoftheweek',
        'appointment_purpose',
        'appointment_type',
        'appointment_status',
        'payment_amount',
        'payment_paidon',
        'payment_status',
    ];
}
