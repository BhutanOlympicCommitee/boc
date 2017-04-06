<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblGameDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_game_details', function (Blueprint $table) {
            $table->increments('gamesdetail_id');
            $table->integer('year');
            $table->integer('type');
            $table->string('name',500);
            $table->integer('country');
            $table->string('venue',500);
            $table->date('startdate');
            $table->date('enddate');
            $table->string('comments',1000);
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
        Schema::dropIfExists('tbl_game_details');
    }
}
