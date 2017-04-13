<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtheleteTrainingAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athelete_training_attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('athlete_id');
            $table->integer('training_id');
            $table->integer('attendance_status');
            $table->string('comments',1000);
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
        Schema::dropIfExists('athelete_training_attendances');
    }
}
