<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthleteBioinformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athlete_bioinformations', function (Blueprint $table) {
            $table->increments('athlete_id');
            $table->string('athlete_title',100);
            $table->string('athlete_fname',500);
            $table->string('athlete_mname',500);
            $table->string('athlete_lname',500);
            $table->string('athlete_occupation',500);
            $table->date('athlete_dob');
            $table->string('athlete_pob',200);
            $table->string('athlete_gender');
            $table->decimal('athlete_height',10,3);
            $table->decimal('athlete_weight',10,3);
            $table->string('athlete_fathername',400);
            $table->string('athlete_passportNo',300);
            $table->bigint('athlete_cid');
            $table->string('athlete_associatedSport',500);
            $table->string('athlete_photo',250);
            $table->integer('athlete_function')->default(2);
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
        Schema::dropIfExists('athlete_bioinformations');
    }
}
