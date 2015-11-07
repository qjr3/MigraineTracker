<div class="navbar navbar-default col-sm-12">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {!! link_to_action('PagesController@dashboard', 'Migraine Tracker', array(), ['class' => 'navbar-brand']) !!}
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li {{ Request::is('home') ? 'class=active' : null }} >{!! link_to_action('PagesController@dashboard', 'Home') !!}</li>
                <li {{ Request::is('about') ? 'class=active' : null }} >{!! link_to_action('PagesController@about', 'About') !!}</li>
                <li {{ Request::is('journal') ? 'class=active' : null }}>{!! link_to_action('JournalController@index', 'Journal') !!}</li>
                <li {{ Request::is('trigger') ? 'class=active' : null }}>{!! link_to_action('TriggerController@index', 'Triggers') !!}</li>
                <li {{ Request::is('medicine') ? 'class=active' : null }}>{!! link_to_action('MedicineController@index', 'Medication') !!}</li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <?php $user = Auth::user() ?>
                    <span class="navbar-text navbar-right">
                        {!! link_to_action('UserController@show', $user->name, $user->id ) !!}
                        |
                        {!! link_to_action('Auth\AuthController@getLogout', 'Sign Out') !!}</span>
                @else
                    <li {{ Request::is('login') ? 'class=active' : null }}>{!! link_to_action('Auth\AuthController@getLogin', 'Sign In') !!}</li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</div>
