@extends('master')

@section('title')
Welcome to Migraine Tracker
@stop


@section('header')

@stop




@section('content')
<div class="container">
    <div class="content">
        <div class="title">Migraine Tracker</div>
        
        <div class="btn-group">
            <a class='btn btn-block' href='/user/login'>Login</a><br />
            <a class='btn btn-block' href='/user/create'>New User</a>
            <a class='btn btn-block has-warning' href='/test'>Testing Area</a>
        </div>
    
    </div>
</div>
@stop


@section('footer')

@stop