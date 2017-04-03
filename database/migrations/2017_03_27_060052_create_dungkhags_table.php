<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDungkhagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dungkhags', function (Blueprint $table) {
            $table->increments('dungkhag_id');
            $table->integer('dzongkhag_id');
            $table->string('dungkhag_name',400);
            $table->integer('created_by');
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
        Schema::dropIfExists('dungkhags');
    }
}
