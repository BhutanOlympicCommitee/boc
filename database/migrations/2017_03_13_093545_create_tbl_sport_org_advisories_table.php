<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSportOrgAdvisoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sport_org_advisories', function (Blueprint $table) {
            $table->increments('ad_member_id');
            $table->integer('sport_org_id');
            $table->string('ad_member_name',500);
            $table->string('ad_member_designation',50);
            $table->integer('mg_member_phone');
            $table->string('mg_member_email',100);
            $table->integer('mg_member_mobile');
            $table->date('appointment_date');
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
        Schema::dropIfExists('tbl_sport_org_advisories');
    }
}
