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
                            <div class="text-muted bootstrap-admin-box-title clearfix">Sport Organization Profile
                            <a class='btn btn-success glyphicon glyphicon-plus pull-right' href='{{route('sport_organization.create')}}'>Add</a> 
                            </div>
                        </div>
                        <div class="bootstrap-admin-panel-content">
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                   {{ Session::get('success') }}
                                </div>
                            @endif
                            <table class="table table-bordered table-striped table-responsive" id="table1">
                                <thead>
                                    <tr>
                                        <th style="width:2%;">Sl_no:</th>
                                        <th>Sporting Organization Name</th>
                                        <th style="width:2%;">Abbreviation</th>
                                        <th>Phone No.</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>   
                                </thead>
                                <tbody>
                                <?php $id=1?>
                                @foreach($sport_org as $sport)
                                @if($sport->Status==0)
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{$sport->sport_org_name}}</td>
                                    <td>{{$sport->sport_org_abbreviation}}</td>
                                    <td>{{$sport->sport_org_phone}}</td>
                                    <td>{{$sport->sport_org_email}}</td>
                                    <td>
                                        <form class="form-group" action="{{route('sport_organization.destroy',$sport->sport_org_id)}}" method='post'>
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a href="{{route('sport_organization.edit',$sport->sport_org_id)}}" class="btn btn-info glyphicon glyphicon-edit">Edit</a>
                                            <button type="submit" class="btn btn-warning glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this data');" name='name'>Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
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
              

              
