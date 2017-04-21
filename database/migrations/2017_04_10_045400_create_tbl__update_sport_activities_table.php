<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUpdateSportActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl__update_sport_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('five_yr_plan_id');
            $table->integer('skra_id');
            $table->integer('skra_activity_id');
            $table->integer('wieghtage');
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
        Schema::dropIfExists('tbl__update_sport_activities');
    }
}
