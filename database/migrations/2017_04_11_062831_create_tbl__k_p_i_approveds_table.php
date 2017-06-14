<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblKPIApprovedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl__k_p_i_approveds', function (Blueprint $table) {
            $table->increments('kpi_approval_id');
            $table->integer('kpi_id');
            $table->string('approved_kpi_name',500);
            $table->decimal('approved_RGoB',8,2);
            $table->decimal('approved_external',8,2);
            $table->string('approved_unit',250);
            $table->decimal('approved_baseline',8,2);
            $table->integer('approved_goodRgStart');
            $table->integer('approved_goodRgEnd');
            $table->integer('approved_avgRgStart');
            $table->integer('approved_avgRgEnd');
            $table->integer('approved_poorRgStart');
            $table->integer('approved_poorRgEnd');
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
        Schema::dropIfExists('tbl__k_p_i_approveds');
    }
}
