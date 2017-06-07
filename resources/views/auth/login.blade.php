@extends('layouts.app')
@section('nav-bar')
@include('includes.header')
@endsection
@section('content')
</br>
</br>
</br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style='margin-left:65px'>
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Login</strong></div>
                <div class="panel-body">
                 @if(Session::has('success'))
                    <div class="alert alert-success">
                      {{ Session::get('success') }}
                    </div>
                 @endif
                 @if(Session::has('failure'))
                    <div class="alert alert-danger">
                      {{ Session::get('failure') }}
                    </div>
                 @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login_custome') }}">
                        {{ csrf_field() }}
                       
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="emp_id" class="col-md-4 control-label">Employee No</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="emp_id" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       {{--  <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Password?
                                </a>
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
