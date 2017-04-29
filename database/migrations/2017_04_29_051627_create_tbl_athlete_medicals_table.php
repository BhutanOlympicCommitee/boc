<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAthleteMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_athlete_medicals', function (Blueprint $table) {
            $table->increments('medical_id');
            $table->integer('athlete_id');
            $table->date('date');
            $table->string('checked',250);
            $table->decimal('weight',4,3);
            $table->decimal('height',4,3);
            $table->string('condition');
            $table->string('remarks',500);
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
        Schema::dropIfExists('tbl_athlete_medicals');
    }
}
