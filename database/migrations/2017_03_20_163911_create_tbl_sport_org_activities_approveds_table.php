<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSportOrgActivitiesApprovedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sport_org_activities_approveds', function (Blueprint $table) {
            $table->increments('activity_approval_id');
            $table->integer('activity_id');
            $table->string('approved_activity_name',500);
            $table->string('approved_activity_baseline',2000);
            $table->string('approved_activity_target',2000);
            $table->string('approved_activity_venue',2000);
            $table->string('approved_activity_timeline',500);
            $table->decimal('approved_capital_budget', 8,2);
            $table->decimal('approved_recurring_budget', 8,2);
            $table->string('remarks',5000);
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
        Schema::dropIfExists('tbl_sport_org_activities_approveds');
    }
}
