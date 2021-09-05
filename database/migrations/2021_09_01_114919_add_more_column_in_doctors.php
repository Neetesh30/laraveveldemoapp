<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnInDoctors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('clinic_name')->nullable()->after('imagepath');
            $table->string('clinic_addr')->nullable()->after('clinic_name');
            $table->string('clinic_imagepath')->nullable()->after('clinic_addr');
            $table->string('address')->nullable()->after('clinic_imagepath');
            $table->string('city')->nullable()->after('address');
            $table->string('state')->nullable()->after('city');
            $table->integer('zipcode')->nullable()->after('state');
            $table->string('country')->nullable()->after('zipcode');
            $table->string('doctor_fees')->nullable()->after('country');
            $table->string('services')->nullable()->after('doctor_fees');
            $table->string('specialization')->nullable()->after('services');
            $table->string('edu_degree')->nullable()->after('specialization');
            $table->string('edu_college')->nullable()->after('edu_degree');
            $table->string('edu_yearcompleted')->nullable()->after('edu_college');
            $table->string('exp_hospitalname')->nullable()->after('edu_yearcompleted');
            $table->string('exp_fromtime')->nullable()->after('exp_hospitalname');
            $table->string('exp_totime')->nullable()->after('exp_fromtime');
            $table->string('exp_designation')->nullable()->after('exp_totime');
            $table->string('awards_name')->nullable()->after('exp_designation');
            $table->string('awards_year')->nullable()->after('awards_name');
            $table->string('membership_name')->nullable()->after('awards_year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            //
        });
    }
}
