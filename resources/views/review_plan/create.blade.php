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
              <div class="text-muted bootstrap-admin-box-title clearfix">Review
              </div>
             </div>
            <div class="bootstrap-admin-panel-content">

                       <table>
                    <thead>
                        <td>Proposed</td>
                        <td></td>
                        <td>Approved</td>
                        <tr>
                            <th>Year</th>
                            <td><select class="form-control"><option>2017</option></select></td>
                            <td><select class="form-control"><option>2017</option></select></td>   
                        </tr> 
                         <tr>
                           <tr>
                            <th>SKRA</th>
                            <td ><select class="form-control"><option>Promotion of Indegenous Games and Sport</option></select></td>
                            <td><select class="form-control"><option>Promotion of Indegenous Games and Sport</option></select></td>   
                        </tr>   
                        <tr>
                            <th>SKRA Activities/NSF Outputs</th>
                            <td><select class="form-control"><option>Technical Support to School Sports program</option></select></td>
                            <td><select class="form-control"><option>Technical Support to School Sports program</option></select></td>   
                        </tr>   
                        <tr>
                          <th>Activity</th>
                          <td><input type="text" value="Train students in Archery" class="form-control"></td>
                          <td><input type="text" value="Train students in Archery" class="form-control"></td>
                        </tr>
                         <th>Baseline</th>
                          <td><input type="text" value="50 students traning in fiscal year 2017" class="form-control"></td>
                          <td><input type="text" value="50 students traning in fiscal year 2017" class="form-control"></td>
                        </tr> 
                         <th>Target</th>
                          <td><input type="text" value="Train 150 students in this fiscal" class="form-control"></td>
                          <td><input type="text" value="Train 150 students in this fiscal" class="form-control"></td>
                        </tr> 
                         <th>Vanue</th>
                          <td><input type="text" value="Monger" class="form-control"></td>
                          <td><input type="text" value="Monger" class="form-control"></td>
                        </tr> 
                        </tr> 
                         <th>Time Line</th>
                          <td><input type="text" value="April to December" class="form-control"></td>
                          <td><input type="text" value="April to December" class="form-control"></td>
                        </tr> 
                         <th>Proposed Capital Budget(Million)</th>
                          <td><input type="text" value="10" class="form-control"></td>
                          <td><input type="text" value="10" class="form-control"></td>
                        </tr> 
                         <th>Proposed Recurring Budegt(Million)</th>
                          <td><input type="text" value="2" class="form-control"></td>
                          <td><input type="text" value="2" class="form-control"></td>
                        </tr>  
                         <th>Collaborating Agencies</th>
                          <td><input type="text" value="Department of Youth and Sports" class="form-control"></td>
                          <td><input type="text" value="Department of Youth and Sports" class="form-control"></td>
                        </tr>    
                    </thead>
                    <tbody>
                       
                    </tbody>

              <form>
                <table class="table table-responsive">
                  <tr>
                    <td>Proposed</td>
                    <td></td>
                    <td>Approved</td>
                  </tr>
                  <tr>
                    <th>Year</th>
                    <td>
                      <select class="form-control">
                        <option>2017</option>
                      </select>
                    </td>
                    <td>
                      <select class="form-control">
                        <option>2017</option>
                      </select>
                    </td>       
                  </tr>   
                  <tr>
                    <th>SKRA</th>
                    <td>
                      <select class="form-control">
                        <option>Promotion of Indegenous Games and Sport</option>
                      </select>
                    </td>
                    <td>
                      <select class="form-control">
                        <option>Promotion of Indegenous Games and Sport</option>
                      </select>
                    </td>   
                  </tr>   
                  <tr>
                    <th>SKRA Activities/NSF Outputs</th>
                    <td>
                     <select class="form-control">
                      <option>Technical Support to School Sports program</option>
                     </select>
                    </td>
                    <td>
                      <select class="form-control">
                        <option>Technical Support to School Sports program</option>
                      </select>
                    </td>   
                  </tr>   
                  <tr>
                    <th>Activity</th>
                    <td>
                      <input type="text" value="Train students in Archery" class="form-control">
                    </td>
                    <td>
                      <input type="text" value="Train students in Archery" class="form-control">
                    </td>
                  </tr>
                   <th>Baseline</th>
                   <td>
                    <input type="text" value="50 students traning in fiscal year 2017" class="form-control">
                    </td>
                    <td>
                      <input type="text" value="50 students traning in fiscal year 2017" class="form-control">
                    </td>
                  </tr> 
                  <tr>
                    <th>Target</th>
                    <td>
                      <input type="text" value="Train 150 students in this fiscal" class="form-control">
                    </td>
                    <td>
                      <input type="text" value="Train 150 students in this fiscal" class="form-control">
                    </td>
                  </tr>
                  <tr> 
                    <th>Vanue</th>
                    <td>
                      <input type="text" value="Monger" class="form-control">
                    </td>
                    <td>
                      <input type="text" value="Monger" class="form-control">
                    </td>
                  </tr> 
                  <tr>
                    <th>Time Line</th>
                    <td>
                      <input type="text" value="April to December" class="form-control">
                    </td>
                    <td>
                      <input type="text" value="April to December" class="form-control">
                    </td>
                  </tr> 
                  <tr>
                    <th>Proposed Capital Budget(Million)</th>
                    <td>
                      <input type="text" value="10" class="form-control">
                    </td>
                    <td>
                      <input type="text" value="10" class="form-control">
                    </td>
                  </tr> 
                  <tr>
                    <th>Proposed Recurring Budegt(Million)</th>
                    <td>
                      <input type="text" value="2" class="form-control">
                    </td>
                    <td>
                      <input type="text" value="2" class="form-control">
                    </td>
                  </tr>
                  <tr>  
                    <th>Collaborating Agencies</th>
                    <td>
                      <input type="text" value="Department of Youth and Sports" class="form-control">
                    </td>
                    <td>
                      <input type="text" value="Department of Youth and Sports" class="form-control">
                    </td>
                  </tr>    
                </table>
                <div class='form-group'>
                  <div class="col-xs-10 col-xs-offset-2 input-group">
                    <button type='submit' class='btn btn-default col-xs-2' name='update1' value='form1'>Update</button>
                    <a href="{{route('review_plan.index')}}" class='btn btn-default col-xs-2 col-xs-offset-1'> Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer')
<div class="container">
    <div class="row">
        @include('includes.footer')
   
    </div>
</div>
@endsection
               
