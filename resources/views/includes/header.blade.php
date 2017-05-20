<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Athlete Information System</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
       @if (Auth::guest())
        <li class="active"><a href="http://bhutanolympiccommittee.org/"><strong>[Home]</strong></a></li>
      @else
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
</nav>
{{-- <nav class="navbar nav-default navbar-fixed-top" style="background-color:#66b9bf">
  <div class="container">
    <div class="navbar-header">

      <!-- Collapsed Hamburger -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- Branding Image -->
      <a class="navbar-brand navbar-collapse"> <img src="{{URL::asset('/images/boc_1.png')}}" alt="profile Pic" height="70px" width="600px"></img>
      </a>
    </div>
    <br>
    <br>
  
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <!-- Left Side Of Navbar -->
      <ul class="nav navbar-nav">
        &nbsp;
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
        <li><a href="http://bhutanolympiccommittee.org/"><strong>[Home]</strong></a></li>
        @else
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
<br>
<br> --}}