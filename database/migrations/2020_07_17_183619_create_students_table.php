<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{ /**
 * Run the migrations.
 *
 * @param $data
 * @return void
 */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('hqmcm_id')->unique();
            $table->string('firstName');
            $table->string('secondName');
            $table->string('familyName');
            $table->integer('id_number')->unique()->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('phoneNumber');
            $table->integer('area');
            $table->integer('mosque');
            $table->integer('group');
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
        Schema::dropIfExists('students');
    }
}
