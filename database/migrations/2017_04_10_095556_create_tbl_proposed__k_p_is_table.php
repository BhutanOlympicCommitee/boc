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
            $table->decimal('RGoB',8,2);
            $table->decimal('external',8,2);
            $table->string('unit',250);
            $table->decimal('baseline',8,2);
            $table->decimal('good',8,2);
            $table->decimal('average',8,2);
            $table->decimal('poor',8,2);
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
