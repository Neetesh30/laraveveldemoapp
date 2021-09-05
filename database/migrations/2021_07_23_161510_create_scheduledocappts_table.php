<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduledocapptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduledocappts', function (Blueprint $table) {
            $table->id();
            $table->integer('doctorid');
            $table->enum('dayoftheweek',['sunday','monday','tuesday','wednesday','thursday','friday','saturday']);
            $table->string('slotduration');
            $table->string('starttime');
            $table->string('endtime');
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
        Schema::dropIfExists('scheduledocappts');
    }
}
