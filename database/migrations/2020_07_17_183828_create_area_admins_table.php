<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @param $data
     * @return void
     */
    public function up()
    {
        Schema::create('area_admins', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('second_name');
            $table->string('family_name');
            $table->integer('id_number');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('phone_number');
            $table->string('area');
            $table->integer('hqmcm_id');
            $table->rememberToken();
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
        Schema::dropIfExists('area_admins');
    }
}
