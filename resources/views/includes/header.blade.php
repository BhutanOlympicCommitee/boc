<nav class="navbar navbar-fixed-top" style="background-color:#008000;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="" href="#"><img class="img-responsive" src="{{URL::asset('/images/logo.png')}}" style="height:103px;width:760px;margin-left:273px;"></img></a>
    </div>
    <div>
    <ul class="nav navbar-nav navbar-right">
       @if (Auth::guest())
     </br>
        
      @else
    </br>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:black;">
            <b>{{ Auth::user()->emp_id }}</b> <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li>
                <a class="btn btn-link" href="{{ url('/change-password') }}"><b>Change Password</b>
                </a>
              <a href="{{ url('/logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <b>Logout</b>
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{csrf_field()}}
            </form>
          </li>
        </ul>
      </li>
      @endif
    </ul>
  </div>
  </div>
</nav>
</br>
</br>
</br>