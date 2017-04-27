<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUpdateAthleteAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_update_athlete_achievements', function (Blueprint $table) {
            $table->increments('athlete_id');
            $table->bigInteger('athlete_cid');
            $table->string('athlete_name',250);
            $table->date('athlete_dob');
            $table->integer('dzongkhag_id');
            $table->integer('gewog_id');
            $table->string('village',250);
            $table->integer('occupation_id');
            $table->string('fathername',250);
            $table->integer('mobile');
            $table->string('email',200);
            $table->string('contact_address',1000);
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('tbl_update_athlete_achievements');
    }
}
