<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAthleteAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_athlete_achievements', function (Blueprint $table) {
            $table->increments('athlete_achievement_id');
            $table->integer('athlete_id');
            $table->integer('medal_id');
            $table->date('date');
            $table->string('achievement',1000);
            $table->string('event_name',250);
            $table->string('other',200);
            $table->string('category',250);
            $table->string('remark',1000);
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
        Schema::dropIfExists('tbl_athlete_achievements');
    }
}
