<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUpdateSportActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl__update_sport_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('five_yr_plan_id');
            $table->integer('skra_id');
            $table->integer('skra_activity_id');
            $table->integer('wieghtage');
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
        Schema::dropIfExists('tbl__update_sport_activities');
    }
}
<table class="table table-bordered table-striped table-responsive" id="table1">
                                        <thead>
                                            <tr>
                                                <th>Sl. No:</th>
                                                <th>AKRA</th>
                                                <th>BoC Program</th>
                                                <th>Activity</th>
                                                <th>Venue</th>
                                                <th>RGoB Budget</th>
                                                <th>External Budget</th>
                                                <th style='width:20%'>Action</th>
                                            </tr>   
                                        </thead>
                                        <tbody>
                                        <?php $id=1 ?>
                                        
                                        <tr>
                                            <td>{{$id++}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <form class="form-group">
                                                  <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick=''>Edit</a>
                                                  <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick=''>KPI</a>
                                                  
                                                  </button>
                                                </form>
                                            </td>
                                        </tr>
                       
                                        </tbody>
                                    </table>