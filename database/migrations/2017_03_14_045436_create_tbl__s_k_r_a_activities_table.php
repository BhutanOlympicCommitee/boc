<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSKRAActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl__s_k_r_a_activities', function (Blueprint $table) {
            $table->increments('skra_activity_id');
            $table->integer('five_yr_plan_id');
            $table->integer('sport_org_id');
            $table->integer('skra_id');
            $table->string('SKRA_activity',250);
            $table->string('SKRA_description',1500);
            $table->timestamps();
            $table->integer('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl__s_k_r_a_activities');
    }
}
