<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMosqueAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @param $data
     * @return void
     */
    public function up()
    {
        Schema::create('mosque_admins', function (Blueprint $table) {

            $table->id();
            $table->string('firstName');
            $table->string('secondName');
            $table->string('familyName');
            $table->integer('id_number');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('phoneNumber');
            $table->string('area');
            $table->string('mosque');
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
        Schema::dropIfExists('mosque_admins');
    }
}
