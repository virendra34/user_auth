@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Welcome {{$user->name}}</h1>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST">
            {{ csrf_field() }}
            <a href="{{route('users.index')}}" class="btn btn-primary btn-md">CRUD PAGE</a>
            <input type="submit" value="logout">
        </form>
        @stop
    </div>
</div>