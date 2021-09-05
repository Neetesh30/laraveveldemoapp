<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBookingColumnSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scheduledocappts', function (Blueprint $table) {
            $table->enum('booking_status',['unbooked','booked'])->default('unbooked')->after('endtime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scheduledocappts', function (Blueprint $table) {
            $table->dropColumn('booking_status');
        });
    }
}
