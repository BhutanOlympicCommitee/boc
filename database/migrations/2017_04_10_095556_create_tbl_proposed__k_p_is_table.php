<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProposedKPIsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_proposed__k_p_is', function (Blueprint $table) {
            $table->increments('kpi_id');
            $table->integer('activity_id');
            $table->string('kpi_name',500);
            $table->string('kpi_description',1000);
            $table->decimal('kpi_weight',8,2);
            $table->string('unit',250);
            $table->decimal('baseline',8,2);
            $table->integer('goodRgStart');
            $table->integer('goodRgEnd');
            $table->integer('avgRgStart');
            $table->integer('avgRgEnd');
            $table->integer('poorRgStart');
            $table->integer('poorRgEnd');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('tbl_proposed__k_p_is');
    }
}
