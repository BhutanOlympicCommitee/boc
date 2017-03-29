<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthleteQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athlete_qualifications', function (Blueprint $table) {
            $table->increments('qualification_id');
            $table->integer('athlete_id');
            $table->integer('address_id');
            $table->string('qualification_level',200);
            $table->string('qualification_description',1500);
            $table->integer('qualification_year');
            $table->integer('country_id');
            $table->string('qualification_institute',500);
            $table->integer('created_by');
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
        Schema::dropIfExists('athlete_qualifications');
    }
}
