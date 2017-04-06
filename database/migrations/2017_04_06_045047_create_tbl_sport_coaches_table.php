<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSportCoachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sport_coaches', function (Blueprint $table) {
            $table->increments('sc_id');
            $table->integer('gamesdetail_id');
            $table->integer('federation');
            $table->integer('sport');
            $table->integer('coach');
            $table->string('comments',1000);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('tbl_sport_coaches');
    }
}
