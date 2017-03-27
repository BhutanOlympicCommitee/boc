<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSportOrgActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sport_org_activities', function (Blueprint $table) {
            $table->increments('activity_id');
            $table->integer('year_id');
            $table->integer('sport_org_id');
            $table->integer('skra_id');
            $table->integer('skra_activity_id');
            $table->string('collaborating_agency',500);
            $table->string('activity_name',500);
            $table->string('activity_baseline',2000);
            $table->string('activity_target',2000);
            $table->string('activity_venue',500);
            $table->string('activity_timeline',2000);
            $table->decimal('proposed_capital_budget', 8,2);
            $table->decimal('proposed_recurring_budget', 8,2);
            $table->string('remarks',5000);
            $table->integer('submit_status');
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
        Schema::dropIfExists('tbl_sport_org_activities');
    }
}
