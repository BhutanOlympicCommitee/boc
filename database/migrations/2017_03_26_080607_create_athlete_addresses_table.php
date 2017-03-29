<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthleteAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athlete_addresses', function (Blueprint $table) {
            $table->increments('address_id');
            $table->integer('athlete_id');
            $table->string('Paddress_dzongkhag',200);
            $table->string('Paddress_dungkhag',200);
            $table->string('Paddress_gewog',200);
            $table->string('Paddress_village',200);
            $table->string('Caddress_dzongkhag',200);
            $table->string('Caddress_dungkhag',200);
            $table->string('Caddress_email',300);
            $table->integer('Caddress_phone');
            $table->integer('Caddress_mobile');
            $table->string('Caddress_contactAddress',1500);
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
        Schema::dropIfExists('athlete_addresses');
    }
}
