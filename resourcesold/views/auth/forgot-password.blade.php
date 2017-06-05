@extends('layouts.app')
@section('nav-bar')
@include('includes.header')
@endsection
@section('content')
</br>
</br>
<div class="container">
    <div class="row">
        <div class="col-md-8" style='margin-left:30px'>
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Forgot Password</strong></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('post-forgot-password') }}">
                        {{ csrf_field() }}
                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                       
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</br>
</br>
@endsection
@section('footer')
<div class="container">
  <div class="row">
    @include('includes.footer')
  </div>
</div>
@endsection
