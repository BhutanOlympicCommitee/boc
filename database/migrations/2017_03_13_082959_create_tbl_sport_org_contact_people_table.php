<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSportOrgContactPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sport_org_contact_people', function (Blueprint $table) {
            $table->increments('sport_org_contact_person_id');
            $table->integer('sport_org_id');
            $table->string('contact_person_name',500);
            $table->integer('contact_person_phone');
            $table->integer('contact_person_fax');
            $table->string('contact_person_email',100);
            $table->integer('contact_person_mobile');
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
        Schema::dropIfExists('tbl_sport_org_contact_people');
    }
}
