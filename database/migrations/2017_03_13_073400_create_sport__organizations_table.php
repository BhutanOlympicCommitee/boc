<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport__organizations', function (Blueprint $table) {
            $table->increments('sport_org_id');
            $table->integer('sport_org_type_id');
            $table->string('sport_org_name',250);
            $table->string('sport_org_abbreviation',100);
            $table->string('sport_org_webaddress',250);
            $table->string('sport_org_logo',250);
            $table->string('sport_org_email',250);
            $table->integer('sport_org_phone');
            $table->integer('sport_org_fax');
            $table->string('sport_org_office_address',1000);
            $table->integer('Status')->default(0);
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
        Schema::dropIfExists('sport__organizations');
    }
}
