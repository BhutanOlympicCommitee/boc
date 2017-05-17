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
                            <div class="text-muted bootstrap-admin-box-title clearfix">Athlete Qualification Information
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
                                        <th>Level</th>
                                        <th>Course Description</th>
                                        <th style="width:2%;">Year of Completion</th>
                                        <th>Country</th>
                                        <th>Institute</th>
                                        <th>Action</th>
                                    </tr>   
                                </thead>
                                <tbody>
                                <?php $id=1?>
                                @foreach($athlete_qualification as $athlete)
                                
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{$athlete->displayLevel->qualification_level}}</td>
                                    <td>{{$athlete->qualification_description}}</td>
                                    <td>{{$athlete->qualification_year}}</td>
                                    <td>{{$athlete->displayCountry->country_name}}</td>
                                    <td>{{$athlete->qualification_institute}}</td>
                                    <td>
                                        <form class="form-group" action="{{route('athlete_qualification.destroy',$athlete->qualification_id)}}" method='post'>
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a href="{{route('athlete_qualification.edit',$athlete->qualification_id)}}" class="btn btn-info glyphicon glyphicon-edit">Edit</a>
                                            <button type="submit" class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this data');" name='name'>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class='clearfix'>
                                 <a href="{{route('athlete_info.create')}}" class='pull-right btn btn-primary'>Finish</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
      $(function()
    {
        $('#table1').DataTable(
           {
           "language": {
           "search": "Filter athlete qualification:"
     }
     }
          );
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
              

              
