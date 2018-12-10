<header>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('dashboard') }}"><i class="fa fa-rebel fa-lg" aria-hidden="true"></i>Facemash</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </span>
        </div>
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('account') }}"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{route('logout')}}"><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-globe fa-lg" aria-hidden="true"></i></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{route('chat')}}"><i class="fa fa-envelope-open fa-lg"  aria-hidden="true"></i></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-user fa-lg" aria-hidden="true"></i></a></li>
      </ul>




    </div>
  </div>
</nav>

</header>
