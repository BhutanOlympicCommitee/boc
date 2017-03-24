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
              <div class="text-muted bootstrap-admin-box-title">Executive board member
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <ul class='nav nav-pills nav-justified'>
                <li id='org_info'><a href="#Org-info" data-toggle="tab">Organization Information</a></li>
                <li id='contact_info'><a href="#Contact-info" data-toggle="tab">Contact Person Information</a></li>
                <li id='management_info'><a href="#Management-info" data-toggle="tab">Secretariate Information</a></li>
                <li class='active'><a href="#Advisory-info" data-toggle="tab">Executive Board Information</a></li>
              </ul>
              @if($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
                </div>
              @endif
              @if(Session::has('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div>
              @endif
              <table class="table table-bordered table-striped table-responsive" id="table1">
                <thead>
                  <tr>
                    <th>Sl_no:</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Appointment Date</th>
                    <th>Action</th>
                  </tr> 
                </thead>
                <tbody>
                  <?php $id=1?>
                  @foreach($advisory as $advisories)
                  @if($advisories->status==0)
                  <tr>
                    <td>{{$id++}}</td>
                    <td>{{$advisories->ad_member_name}}</td>
                    <td>{{$advisories->ad_member_designation}}</td>
                    <td>{{$advisories->appointment_date}}</td>
                    <td>
                      <form class="form-group" action="{{route('advisory_board_members.destroy',$advisories->ad_member_id)}}" method='post'>
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{-- <a href="{{route('advisory_board_members.edit',$advisories->ad_member_id)}}" class="btn btn-primary glyphicon glyphicon-edit">Edit</a> --}}

                        <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick='fun_edit({{$advisories->ad_member_id}})'>Edit</a>
                        <button type="submit" class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this data');" name='name'>Remove
                        </button>
                     </form>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
              <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('advisory/view')}}">
              <div class='form-group'>
                <div class="col-xs-11 col-xs-offset-7 input-group" style='margin-top:20px'>
                  {{-- <a href="{{route('advisory_board_members.create')}}" class="btn btn-default col-xs-2 glyphicon glyphicon-plus">Add</a> --}}
                  <a class='btn btn-success glyphicon glyphicon-plus col-xs-offset-1' data-toggle='modal' data-target="#addModal">Add</a> 
                  <a href="{{route('sport_organization.index')}}" class='btn btn-default col-xs-offset-2 glyphicon glyphicon-remove'>Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id='Org-info'>
    <script type="text/javascript">
      $(function()
      {
        $('#org_info').click(function(){
          window.location="{{url(route('sport_organization.edit',Session::get('key1')))}}"
        });
      });
    </script>
  </div>
  <div id='Contact-info'>
    <script type="text/javascript">
      $(function()
      {
        $('#contact_info').click(function(){
          window.location="{{url(route('contact_person.edit',Session::get('key2')))}}"
        });
      });
    </script>
  </div>
  <div id='Management-info'>
  <script type="text/javascript">
    $(function()
    {
      $('#management_info').click(function(){
        window.location="{{url(route('management_committee.index'))}}"
      });
    });
  </script>
</div>
</div>
<!-- Add modal begins-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Executive Board Member</h4>
      </div>
      <div class="modal-body">
        <form action='{{route('advisory_board_members.store')}}' method='post'>
          {{csrf_field()}}
          <div class='form-group'>
              <label for='ad_name' class='col-xs-3'>Name</label>
                  <div class='col-xs-9 input-group'>
                      <input type="text" name="ad_name" class="form-control" placeholder="Enter advisory board members name">
                  </div>
          </div>
          <div class='form-group'>
              <label for='ad_designation' class='col-xs-3'>Designation</label>
                  <div class='col-xs-9 input-group'>
                      <input type="text" name="ad_designation" class="form-control" placeholder="Enter advisory board members designation">
                  </div>
          </div>
          <div class='form-group'>
              <label for='ad_phone' class='col-xs-3'>Phone</label>
                  <div class='col-xs-9 input-group'>
                      <input type="text" name="ad_phone" class="form-control" placeholder="Enter advisory board members phone number">
                  </div>
          </div>
          <div class='form-group'>
              <label for='ad_email' class='col-xs-3'>Email</label>
                  <div class='col-xs-9 input-group'>
                      <input type="email" name="ad_email" class="form-control" placeholder="Enter advisory board members email">
                  </div>
          </div>
          <div class='form-group'>
              <label for='ad_mobile' class='col-xs-3'>Mobile</label>
                  <div class='col-xs-9 input-group'>
                      <input type="text" name="ad_mobile" class="form-control" placeholder="Enter advisory board members mobile number">
                  </div>
          </div>
          <div class='form-group'>
              <label for='ad_appointment' class='col-xs-3'>Appointment date</label>
                  <div class='col-xs-9 input-group'>
                      <input type="date" name="ad_appointment" class="form-control" placeholder="enter advisory board members appointment date">
                  </div>
          </div>
       <div class="modal-footer">
          <button type="submit" class="btn btn-default glyphicon glyphicon-ok">Save</button>
          <button type="button" class="btn btn-default glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Executive Board members</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('update_advisory')}}" method="post" id='form3'>
          {{csrf_field()}}
          <div class='form-group'>
            <label for='ad_name' class='col-xs-3'>Name</label>
                <div class='col-xs-9 input-group'>
                    <input type="text" name="ad_name" class="form-control" placeholder="Enter advisory board members name" id="ad_name">
                </div>
          </div>
          <div class='form-group'>
            <label for='ad_designation' class='col-xs-3'>Designation</label>
                <div class='col-xs-9 input-group'>
                    <input type="text" name="ad_designation" class="form-control" placeholder="Enter advisory board members designation" id="ad_designation">
                </div>
          </div>
          <div class='form-group'>
            <label for='ad_phone' class='col-xs-3'>Phone</label>
                <div class='col-xs-9 input-group'>
                    <input type="text" name="ad_phone" class="form-control" placeholder="Enter advisory board members phone number" id="ad_phone">
                </div>
          </div>
          <div class='form-group'>
            <label for='ad_email' class='col-xs-3'>Email</label>
                <div class='col-xs-9 input-group'>
                    <input type="email" name="ad_email" class="form-control" placeholder="Enter advisory board members email" id="ad_email">
                </div>
          </div>
          <div class='form-group'>
            <label for='ad_mobile' class='col-xs-3'>Mobile</label>
                <div class='col-xs-9 input-group'>
                    <input type="text" name="ad_mobile" class="form-control" placeholder="Enter advisory board members mobile number" id="ad_mobile">
                </div>
          </div>
          <div class='form-group'>
            <label for='ad_appointment' class='col-xs-3'>Appointment date</label>
                <div class='col-xs-9 input-group'>
                    <input type="date" name="ad_appointment" class="form-control" placeholder="enter advisory board members appointment date" id="ad_appointment">
                </div>
          </div>
          <input type="hidden" id="edit_id" name="edit_id">
      <div class="modal-footer">
        <button type="submit" class="btn btn-info">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- ends edit Modal -->
<script type="text/javascript">
  $(function(){
    $('#table1').DataTable({
      'searching':false,
      'paging':false,
      'info':false,
        // dom: 'Bfrtip',
      //    buttons: [
      //       'copy', 'csv', 'excel', 'pdf', 'print'
         // ]
       });
  });
  function fun_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_id").val(result.ad_member_id);
          $("#ad_name").val(result.ad_member_name);
          $("#ad_designation").val(result.ad_member_designation);
          $("#ad_phone").val(result.mg_member_phone);
          $("#ad_email").val(result.mg_member_email);
          $("#ad_mobile").val(result.mg_member_mobile);
          $("#ad_appointment").val(result.appointment_date);
        }
      });
    }
</script>
@endsection
@section('footer')
<div class="container">
    <div class="row">
        @include('includes.footer')
    </div>
</div>
@endsection


           			
           		
                  
                    
                
    
    
    
    
