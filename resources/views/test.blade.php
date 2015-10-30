@extends('master')

@section('title')Testing Area @stop

@section('content')
<h1>Current WiP Links</h1>
<ul>
    <li>REST: Journal</li>
        <table class='table table-bordered table-striped'>
            <tbody>
                <tr>
                    <td>Create Journal</td>
                    <td>/journal/create</td>
                    <td>JournalController@create</td>
                    <td>/view/journal/create.blade.php</td>
                </tr>
                <tr>
                    <td>Show Journal</td>
                    <td>/journal/show/{journal}</td>
                    <td>JournalController@show</td>
                    <td>/view/journal/show.blade.php</td>
                </tr>
                <tr>
                    <td>Journal Index</td>
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
                    <td>/view/user/create.blade.php</td>
                </tr>
                <tr>
                    <td>{!! link_to_action('Auth\AuthController@getLogin', 'User Login') !!}</td>
                    <td>[get]/login</td>
                    <td>Auth\Auth\AuthController@getLogin</td>
                    <td>/view/user/login</td>
                </tr>
                <tr>
                    <td>{!! link_to_action('UserController@show', 'User Profile', (isset($user) ? $user->id : '?')) !!}</td>
                    <td>[get]/user/{id}</td>
                    <td>UserController@show</td>
                    <td>/view/user/profile</td>
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