<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnInAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('appname')->nullable()->after('imagepath');
            $table->string('applogoimagepath')->nullable()->after('appname');
            $table->string('applogofaviconimagepath')->nullable()->after('applogoimagepath');
            $table->string('about_doctorapp')->nullable()->after('applogofaviconimagepath');
            $table->string('app_contactno')->nullable()->after('about_doctorapp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
        });
    }
}
