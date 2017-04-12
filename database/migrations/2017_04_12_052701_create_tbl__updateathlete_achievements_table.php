<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUpdateathleteAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl__updateathlete_achievements', function (Blueprint $table) {
            $table->increments('AthleteAchievement_id');
            $table->integer('athlete_id');
            $table->integer('activity_id');
            $table->integer('sport_id');
            $table->integer('medal_id');
            $table->string('remarks',1000);
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
        Schema::dropIfExists('tbl__updateathlete_achievements');
    }
}
