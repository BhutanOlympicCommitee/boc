<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_achievements', function (Blueprint $table) {
            $table->increments('achievements_id');
            $table->integer('activity_id');
            $table->string('actual_timeline',250);
            $table->decimal('actual_capital_expenses', 8,2);
            $table->decimal('actual_recurring_expenses', 8,2);
            $table->string('actual_achievements',5000);
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
        Schema::dropIfExists('tbl_achievements');
    }
}
