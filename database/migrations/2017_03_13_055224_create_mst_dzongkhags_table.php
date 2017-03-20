<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstDzongkhagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_dzongkhags', function (Blueprint $table) {
            $table->increments('dzongkhag_id');
            $table->integer('country_id');
            $table->string('dzongkhag_name',250);
            $table->string('dzongkhag_code',50);
            $table->integer('status')->default(0);
            $table->timestamps();
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
        Schema::dropIfExists('mst_dzongkhags');
    }
}
