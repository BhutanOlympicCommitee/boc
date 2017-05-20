<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesAchievementReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities_achievement_reports', function (Blueprint $table) {
            $table->increments('report_id');
            $table->integer('approval_activity_id');
            $table->string('kpi_approval_id',200);
            $table->decimal('approved_rgob_budget',8,2);
            $table->decimal('rgob_utilization',5,2);
            $table->decimal('approval_external_budget',8,2);
            $table->decimal('external_utilization',5,2);
            $table->string('target_achieved',100);
            $table->string('external_target',100);
            $table->string('rgob_score',500);
            $table->string('external_score',500);
            $table->string('remarks',1000);
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
        Schema::dropIfExists('activities_achievement_reports');
    }
}
