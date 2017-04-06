<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_team_members', function (Blueprint $table) {
            $table->increments('team_id');
            $table->integer('federation');
            $table->integer('sport');
            $table->integer('athlete_id');
            $table->integer('athlete_name');
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('tbl_team_members');
    }
}
