<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Migraine Tracker</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li {{ Request::is('/') ? 'class=active' : null }}><a href="/">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="#">About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

        @if(Auth::check())
          <?php $user = Auth::user() ?>
          <span class="navbar-text navbar-right">
          Signed in as {!! link_to_action('UserController@showProfile', $user->name, $user->id ) !!}
          |
          {!! link_to_action('Auth\AuthController@getLogout', 'Sign Out') !!}</span>
        @else
          <li {{ Request::is('login') ? 'class=active' : null }}>{!! link_to_action('Auth\AuthController@getLogin', 'Sign In') !!}</li>
        @endif


        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quicklinks <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>{!! link_to_action('TestController@index', 'Testing Area') !!}</li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
