<nav class="navbar navbar-fixed-top" style="background-color:#66b9bf;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img class="img-responsive" src="{{URL::asset('/images/b.png')}}" style="height:88px;width:750px"></img></a>
    </div>
    <div>
    <ul class="nav navbar-nav navbar-right">
       @if (Auth::guest())
     </br>
        
      @else
    </br>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <b>{{ Auth::user()->emp_id }}</b> <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li>
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