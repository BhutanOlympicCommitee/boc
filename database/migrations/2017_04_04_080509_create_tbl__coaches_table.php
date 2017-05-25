<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCoachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl__coaches', function (Blueprint $table) {
            $table->increments('coach_id');
            $table->integer('sport_org_id');
            $table->string('coach_title',20);
            $table->string('coach_fname',100);
            $table->string('coach_mname',100);
            $table->string('coach_lname',100);
            $table->date('coach_dob');
            $table->string('coach_nationality',100);
            $table->integer('coach_phone');
            $table->integer('coach_mobile');
            $table->string('coach_email',200);
            $table->string('coach_passport',100);
            $table->date('coach_appointmentDate');
            $table->date('coach_expiryDate');
            $table->string('coach_contactAddress',500);
            $table->string('coach_type');
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
        Schema::dropIfExists('tbl__coaches');
    }
}
