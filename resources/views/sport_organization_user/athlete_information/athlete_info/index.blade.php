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
                            <div class="text-muted bootstrap-admin-box-title clearfix">Athlete Information Details
                            <a class='btn btn-success glyphicon glyphicon-plus pull-right' href='{{route('athlete_info.create')}}'>Add Athlete Information</a> 
                            </div>
                        </div>
                        <div class="bootstrap-admin-panel-content">
                <?php 
              $user_id=session('user_id');
              $user=App\User::find($user_id);
                ?>
             
                        <form action='{{route("athlete_info.index")}}' method='get'>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class='form-group'>
                                <label class='col-xs-3'>Associated Sport:</label>
                                <div class='col-xs-7 input-group'>
                                    <select name='sport' class='form-control'>
                                      <option value="" disabled selected>Select</option>
                                    @if($user->role_id==4)
                                      <?php 
                                        $org_type=App\Associated_Sport::where('sport_org_id',$user->sport_organization)->get();
                                        foreach($org_type as $org):
                                      ?>
                                      <option value="{{$org->sport_id}}">{{$org->sport_name}}</option>
                                      <?php 
                                        endforeach
                                      ?>
                                    @else
                                    
                                          <?php 
                                              $org_type=App\Associated_Sport::all();
                                              foreach($org_type as $org):
                                            ?>
                                            <option value="{{$org->sport_id}}">{{$org->sport_name}}</option>
                                            <?php 
                                              endforeach
                                            ?>
                                    @endif
                                    </select>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-xs-3'>Athlete Name:</label>
                                <div class='col-xs-7 input-group'>

                                    <input type="text" name="name" class='form-control'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-xs-3'>CID/std ID:</label>
                                <div class='col-xs-7 input-group'>
                                    <input type="text" name="athlete_cid" class='form-control'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <button type='submit' name='search' class='btn btn-primary col-xs-offset-9'>Search</button>
                            </div>
                        </form>
                       
                           @if(isset($_GET['search']))
                            <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th style="width:2%;">Sl_no:</th>
                                        <th>Athlete Name</th>
                                        <th>DOB</th>
                                        <th>CID</th>
                                        <th>Associated Sport</th>
                                        <th>Action</th>
                                    </tr>   
                                </thead>
                                <tbody>
                                <?php $id=1?>
                                @foreach($athlete as $athletes)
                                @if($athletes->Status==0)
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{$athletes->athlete_fname.' '.$athletes->athlete_mname.' '.$athletes->athlete_lname}}</td>
                                    <td>{{$athletes->athlete_dob}}</td>
                                    <td>{{$athletes->athlete_cid}}</td>
                                    <td>{{$athletes->displayAsport->sport_name}}</td>
                                    <td>
                                        <form class="form-group clearfix">
                                        
                                            <a href="{{route('athlete_info.edit',$athletes->athlete_id)}}" class="btn btn-info glyphicon glyphicon-edit">Edit</a>
                                              <a data-toggle='modal' data-target='#viewDetails' class="btn btn-primary" onclick='view_details({{$athletes->athlete_id}})'>Details</a>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>

                            <input type="hidden" name="view_details" id='view_details' value='{{route('show_athlete_info')}}'>
                          <input type="hidden" name="view_address" id='view_address' value='{{route('show_athlete_address')}}'>
                          <input type="hidden" name="view_associated_sport" id='view_associated_sport' value='{{route('show_associated_sport')}}'>
                        </div>
                          @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</br>
</br>
<!-- view details modal begins-->
<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">View Details</h4>
      </div>
      <div class="modal-body">

        <div class='col-md-8'>
        <label>Title:</label>
        <input type="text" name="title" id='title' style='border-style:none'>
        <br>
        <label>First Name:</label>
         <input type="text" name="fname" id='fname' style='border-style:none'><br>
        <label>Last Name:</label>
        <input type="text" name="lname" id='lname' style='border-style:none'><br>
        <label>Occupation:</label>
        <input type="text" name="occupation" id='occupation' style='border-style:none'><br>
        <label>Date of Birth:</label>
        <input type="text" name="birth_date" id='birth_date' style='border-style:none'><br>
        <label>Place of Birth:</label>
        <input type="text" name="birth_place" id='birth_place' style='border-style:none'><br>
        <label>Gender:</label>
        <input type="text" name="gender" id='gender' style='border-style:none'><br>
        <label>Height:</label>
        <input type="text" name="height" id='height' style='border-style:none'><br>
        <label>Weight:</label>
        <input type="text" name="weight" id='weight' style='border-style:none'><br>
        <label>Father's Name:</label>
        <input type="text" name="father_name" id='father_name' style='border-style:none'><br>
        <label>Phone No.:</label>
        <input type="text" name="phone_no" id='phone_no' style='border-style:none'><br>
        <label>Mobile No:</label>
        <input type="text" name="mobile_no" id='mobile_no' style='border-style:none'><br>
        <label>Email:</label>
        <input type="text" name="email" id='email' style='border-style:none'><br>
        <label>Passport No.:</label>
        <input type="text" name="passport" id='passport' style='border-style:none'><br>
        <label>CID:</label>
        <input type="text" name="cid" id='cid' style='border-style:none'><br>
        <label>Associated Sport:</label>
        <input type="text" name="associated_sport" id='associated_sport1' style='border-style:none'>
      </div>
      <div class='col-md-4' id='photo'>
      </div>
      <div class='clearfix'></div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
      </div>
      </div>
    </div>
  </div>
</div>

<!-- ends viewDetails modal-->
<script type="text/javascript">
  $(function()
  {
    $('#newSchedule').click(function()
    {
      window.location="{{url(route('training.create'))}}";
    });
    $('#attendance').click(function()
    {
      window.location="{{url(route('training.attendance'))}}";
    });
  });
  function view_details(id)
  {
    var view_url=$('#view_details').val();
    var view_address=$('#view_address').val();
    var view_sport=$('#view_associated_sport').val();
    var image_path='{{URL::asset('/images/')}}';
    var url='{{route("get_occupation")}}';
    var url1='{{route("get_gender")}}';
    $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          $("#title").val(result.athlete_title);
          $("#fname").val(result.athlete_fname);
          $("#lname").val(result.athlete_lname);
          $("#birth_date").val(result.athlete_dob);
          $("#birth_place").val(result.athlete_pob);
           var occupation=result.athlete_occupation;
          $.ajax({
            url:url,
            type:"GET",
            data:{'id':occupation},
            success:function(result)
            {
               $("#occupation").val(result.occupation_name);
            }
          });
           var gender=result.athlete_gender;
          $.ajax({
            url:url1,
            type:'GET',
            data:{"id":gender},
            success:function(result)
            {
              $("#gender").val(result.gender);
            }
          });
         
          $("#height").val(result.athlete_height);
          $("#weight").val(result.athlete_weight);
          $("#father_name").val(result.athlete_fathername);
          $("#passport").val(result.athlete_passportNo);
          $("#cid").val(result.athlete_cid);
          $('#photo').html('<img style="border:3px solid gray; border-radius: 7px; margin-left: 20px;" height="200px" width="200px" src='+image_path+'/'+result.athlete_photo+'>');
          var sport_id=result.athlete_associatedSport;
           $.ajax({
            url: view_sport,
            type:"GET", 
            data: {"id":sport_id}, 
            success: function(result){
              $("#associated_sport1").val(result.sport_name);
            }
          });
         
        }
      });

     $.ajax({
        url: view_address,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          $("#phone_no").val(result.Caddress_phone);
          $("#mobile_no").val(result.Caddress_mobile);
          $("#email").val(result.Caddress_email);
        }
      });
  }
  </script>
<script type="text/javascript">
    $(function(){
        $('#table1').DataTable(
            {   
                "language": {
           "search": "Filter with athlete CID:"
     },
                dom: 'Bfrtip',
            buttons:[
            'csv', 'excel', 'pdf', 'print'
               ],
                'responsive':true

            });
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
              

              
