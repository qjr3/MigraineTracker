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
                    <td>Create User</td>
                    <td>[get]/user/create</td>
                    <td>UserAccountController@create</td>
                    <td>/view/journal/create.blade.php</td>
                </tr>
                <tr>
                    <td>User Login</td>
                    <td>[get]/user/login</td>
                    <td>UserAccountController@login</td>
                    <td>/view/user/login</td>
                </tr>
                <tr>
                    <td>User Login</td>
                    <td>[put]/user/login/{user}</td>
                    <td>UserController@logingin</td>
                    <td>[No View: Redirect to /journal/index]</td>
                </tr>
            </tbody>
        </table>
</ul>
</ul>
@stop