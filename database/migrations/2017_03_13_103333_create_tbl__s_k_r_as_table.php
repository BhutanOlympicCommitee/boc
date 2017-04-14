<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSKRAsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl__s_k_r_as', function (Blueprint $table) {
            $table->increments('skra_id');
            $table->integer('five_yr_plan_id');
            $table->string('SKRA_name',250);
            $table->string('SKRA_description',1500);
            $table->timestamps();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('tbl__s_k_r_as');
    }
}
