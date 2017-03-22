@extends('layouts.app')
@section('nav-bar')
@include('includes.header')
@endsection
@section('side-bar')
<div class="container">
    <div class="row">
        @include('includes.sidebar')
    </div>
</div>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <!-- content -->
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title">Review Plan
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <form action="{{action('ReviewPlanController@index')}}" method='get' id='view'>
                {{csrf_field()}}
                  <label for='type' class='col-xs-2'>Year:</label>
                    <div class='col-xs-10 input-group'>
                      <select class='form-control' name='type' id='type'>
                        <option>2017</option>
                      </select>
                     
                    </div>
                     <label for='type' class='col-xs-2'>SKRA:</label>
                    <div class='col-xs-10 input-group'>
                      <select class='form-control' name='type' id='type'>
                        <option>Promotion of Games</option>
                      </select>
                    
                    </div>
                     <label for='type' class='col-xs-2'>SKRA Activity:</label>
                    <div class='col-xs-10 input-group'>
                      <select class='form-control' name='type' id='type'>
                        <option>Promotion of games</option>
                      </select>
                    </div>
                     <div class='form-group'>
                  <label for='type' class='col-xs-2'>Sport Organization:</label>
                    <div class='col-xs-10 input-group'>
                      <select class='form-control' name='type' id='type'>
                        <?php 
                          $sports=App\Sport_Organization::all();
                          foreach($sports as $sport):
                        ?>
                        <option value="{{$sport->sport_org_id}}">{{$sport->sport_org_name}}</option>
                        <?php 
                          endforeach
                        ?>

                      </select>
                      <div>
                       <span class='input-group-btn'>
                        <button class='btn btn-default' type='submit' name='submit' value='view'>Search</button>
                     </span>
                   </div>
            </div>
              </div>
              </form>
              @if(isset($_GET['submit']))
                <script type="text/javascript">
                  $(function()
                  {
                    $('#view').hide();
                  });
                </script>
                <?php $sport->sport_org_id=$_GET['type'];?>
                <table class="table table-bordered table-striped table-responsive" id="table1">
                    <thead>
                        <tr>
                            <th>Sl. No:</th>
                            <th>Activities</th>
                            <th>Baseline</th>
                            <th>Target</th>
                            <th>Venue</th>
                            <th>Timeline</th>
                            <th>Recurring Budget</th>
                            <th>Capital Budget</th>
                            <th>Collaborating Budget</th>
                            <th>Action</th>
                        </tr>   
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                           <td>Train students in Archery</td>
                            <td>50 students traning in fiscal</td>
                            <td>Train 150 students in fiscal</td>
                            <td>Monger</td>
                            <td>April to December</td>
                            <td>10</td>
                            <td>20</td>
                            <td>Department of Youth and Sports</td>
                            <td>
                                <form class="form-group" method='post'>
            
                                  <a href="{{route('review_plan.create')}}" class="btn btn-primary">Review</a>
                                  
                                </form>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
                </div>  
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
$(function(){
    $('#table1').DataTable();
});
</script>
@endsection
@section('footer')
<div class="container">
    <div class="row">
        @include('includes.footer')
    </div>
</div>
@endsection

                
                               
                             
