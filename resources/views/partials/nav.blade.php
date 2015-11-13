<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      {!! link_to_action('PagesController@dashboard', 'Migraine Tracker', array(), ['class' => 'navbar-brand']) !!}
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-left">
            <li {{ Request::is('home') ? 'class=active' : null }} >{!! link_to_action('PagesController@dashboard', 'Home') !!}</li>
          <li class="dropdown">

            <a href="#" class="dropdown-toggle {{ Request::is('journal') ? 'active' : null }}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Journals<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>{!! link_to_action('JournalController@index','View All') !!}</li>
              <li>{!! link_to_action('JournalController@create', 'Add New') !!}</li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle {{ Request::is('trigger') ? 'active' : null }}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Triggers<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>{!! link_to_action('TriggerController@index','View All') !!}</li>
              <li>{!! link_to_action('TriggerController@create', 'Add New') !!}</li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle {{ Request::is('medicine') ? 'active' : null }}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Medication<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>{!! link_to_action('MedicineController@index','View All') !!}</li>
              <li>{!! link_to_action('MedicineController@create', 'Add New') !!}</li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle {{ Request::is('note') ? 'active' : null }}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notes<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>{!! link_to_action('NoteController@index','View All') !!}</li>
              <li>{!! link_to_action('NoteController@create', 'Add New') !!}</li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
            <?php $user = Auth::user() ?>
                <span class="navbar-text navbar-right" style='margin-right: 5px'>
            {!! link_to_action('UserController@show', $user->name, $user->id ) !!}
            |
            {!! link_to_action('Auth\AuthController@getLogout', 'Sign Out') !!}</span>
            @else
                <li {{ Request::is('login') ? 'class=active' : null }}>{!! link_to_action('Auth\AuthController@getLogin', 'Login') !!}</li>
                <li {{ Request::is('register') ? 'class=active' : null }}>{!! link_to_action('Auth\AuthController@getRegister', 'Register') !!}</li>
            @endif
        </ul>
    </div>
  </div>
</nav>