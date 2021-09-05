<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookedAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booked_appointments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('patientid');
            $table->bigInteger('doctorid');
            $table->string('appointment_date');
            $table->string('appointment_time');
            $table->enum('appointment_dayoftheweek',['sunday','monday','tuesday','wednesday','thursday','friday','saturday']);
            $table->string('appointment_purpose');
            $table->enum('appointment_type', ['Walk In', 'Video Call']);
            $table->enum('appointment_status', ['Confirmed', 'Cancelled' , 'Re Scheduled']);
            $table->string('payment_amount');
            $table->string('payment_paidon');
            $table->enum('payment_status', ['Paid', 'Not Paid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booked_appointments');
    }
}
