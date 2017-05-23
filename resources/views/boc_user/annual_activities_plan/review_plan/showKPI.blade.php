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
              <div class="text-muted bootstrap-admin-box-title">Show KPI for review
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
            <div class='row clearfix'>
            @foreach($review_kpi as $review)
        <span>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Sport Organization:</strong>{{$review->proposedActivity->updated_activity->getAKRAActivity->getSportOrganization->sport_org_name}}</span><br><br>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Program:</strong>{{$review->proposedActivity->updated_activity->getAKRAActivity->SKRA_activity}}</span><br><br>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Activity:</strong>{{$review->proposedActivity->activity_name}}</span>
        @break;
        @endforeach
      </div><br>
      <div class='clearfix'>
        <div class="table-responsive">
        <table class="table table-bordered table-striped" id="table1">
            <thead>
                <tr>
                    <th>Sl. No:</th>
                    <th>Activity</th>
                    <th>KPI</th>
                    <th>Baseline</th>
                    <th>Good (Target)</th>
                    <th>Average</th>
                    <th>Poor</th>
                    <th>Action</th>
                </tr>   
            </thead>
            <tbody>
            <?php $id=1;
            ?>
            @foreach($review_kpi as $review)
              <tr>
                 <td>{{$id++}}</td>
                 <td>{{$review->proposedActivity->activity_name}}</td>
                  <td>{{$review->kpi_name}}</td>
                  <td>{{$review->baseline}}</td>
                  <td>{{$review->good}}</td>
                  <td>{{$review->average}}</td>
                  <td>{{$review->poor}}</td>
                  <td>
                     @if($review->status==0)
                    <a href="{{route('review_plan.kpi',$review->kpi_id)}}" class="btn btn-info glyphicon glyphicon-edit">Review</a>
                    @endif
                     @if($review->status==1)
                        <a class="btn-warning" style="text-decoration:none;">&nbsp;&nbsp;Reviewed&nbsp;&nbsp;</a>
                    @endif
                  </td>
              </tr>
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
  </div>
</div>
</br>
</br>
<script type="text/javascript">
$('#table1').dataTable(
  {
    'searching':false,
     "responsive": true,
     "oLanguage": { "sEmptyTable": "No KPIs to Review" }
  });
</script>
@endsection
@section('footer')
<div class="container">
</div>
@endsection