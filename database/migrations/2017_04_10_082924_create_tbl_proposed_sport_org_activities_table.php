<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProposedSportOrgActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_proposed_sport_org_activities', function (Blueprint $table) {
            $table->increments('activity_id');
            $table->string('activity_name',500);
            $table->string('activity_venue',500);
            $table->string('quarter',250);
            $table->string('actual',250);
            $table->decimal('rgob_budget',8,2);
            $table->decimal('external_budget', 8,2);
            $table->decimal('external_source', 8,2);
            $table->string('collaborating_agency',500);
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
        Schema::dropIfExists('tbl_proposed_sport_org_activities');
    }
}
