@extends('master')

@section('title')Testing Area @stop

@section('content')
<h1>Current WiP Links</h1>
<ul>
    <li>REST: Journal</li>
        <table class='table table-bordered table-striped'>
            <tbody>
                <tr>
                    <td>{!! link_to_action('JournalController@create', 'Create Journal') !!}</td>
                    <td>/journal/create</td>
                    <td>JournalController@create</td>
                    <td>/view/journal/create.blade.php</td>
                </tr>
                <tr>
                    <td>{!! link_to_action('JournalController@show', 'Show Journal', $user->journals()->first()->id) !!}</td>
                    <td>/journal/show/{journal}</td>
                    <td>JournalController@show</td>
                    <td>/view/journal/show.blade.php</td>
                </tr>
                <tr>
                    <td>{!! link_to_action('JournalController@edit', 'Edit Journal', $user->journals()->first()->id) !!}</td>
                    <td>/journal/{journal}/edit</td>
                    <td>JournalController@edit</td>
                    <td>/view/journal/update.blade.php</td>
                </tr>
                <tr>
                    <td>{!! link_to_action('JournalController@index', 'Journal Index') !!}</td>
                    <td>/journal/index</td>
                    <td>JournalController@index</td>
                    <td>/view/journal/index.blade.php</td>
                </tr>
            </tbody>
        </table>
    <li>REST User Account</li>
        <table class='table table-bordered table-striped'>
            <tbody>
                <tr>
                    <td>{!! link_to_action('Auth\AuthController@getRegister', 'Create User') !!}</td>
                    <td>[get]/register</td>
                    <td>Auth\AuthController@getRegister</td>
                    <td>/view/auth/register.blade.php</td>
                </tr>
                <tr>
                    <td>{!! link_to_action('Auth\AuthController@getLogin', 'User Login') !!}</td>
                    <td>[get]/login</td>
                    <td>Auth\Auth\AuthController@getLogin</td>
                    <td>/view/auth/login.blade.php</td>
                </tr>
                <tr>
                    <td>{!! link_to_action('UserController@show', 'Show Profile', (isset($user) ? $user->id : '?')) !!}</td>
                    <td>[get]/user/{id}</td>
                    <td>UserController@show</td>
                    <td>/view/user/profile.blade.php</td>
                </tr>
                <tr>
                    <td>{!! link_to_action('UserController@edit', 'Edit Profile', (isset($user) ? $user->id : '?')) !!}</td>
                    <td>[get]/user/{id}/edit</td>
                    <td>UserController@edit</td>
                    <td>/view/user/edit.blade.php</td>
                </tr>
                <tr>
                    <td>{!! link_to_action('Auth\AuthController@getLogout', 'User Logout') !!}</td>
                    <td>[get]/logout</td>
                    <td>Auth\AuthController@getLogout</td>
                    <td>None</td>
                </tr>
            </tbody>
        </table>
</ul>
</ul>
@stop