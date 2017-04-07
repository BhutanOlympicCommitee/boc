<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAthleteDisciplinariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_athlete_disciplinaries', function (Blueprint $table) {
            $table->increments('disciplinary_id');
            $table->integer('athlete_id');
            $table->date('date_of_action');
            $table->date('action_end_date');
            $table->string('reason',1000);
            $table->string('remarks',1000);
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
        Schema::dropIfExists('tbl_athlete_disciplinaries');
    }
}
