<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblActivityReportAthleteAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_activity_report_athlete_achievements', function (Blueprint $table) {
            $table->increments('athlete_achievement_id');
            $table->integer('athlete_id');
            $table->integer('activity_id');
            $table->integer('sport_id');
            $table->integer('medal_id');
            $table->string('remarks',250);
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
        Schema::dropIfExists('tbl_activity_report_athlete_achievements');
    }
}
