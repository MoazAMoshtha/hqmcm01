<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMosquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mosques', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->string('area');
            $table->integer('hqmcm_id')->unique();
            $table->string('mosque_admin')->nullable();
            $table->integer('number_of_teachers')->nullable();
            $table->integer('number_of_students')->nullable();
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
        Schema::dropIfExists('mosques');
    }
}
