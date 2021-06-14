@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Login</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        @if(session()->get('success'))
        <div class="alert alert-success">
            <div class="text-semibold">{{ session()->get('success') }}</div>
        </div>
        @endif
        <div class="col-md-12">
            <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="email" class="form-control p_input" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label>Password *</label>
                    <input type="password" name="password" class="form-control p_input">
                </div>
                <hr />
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                </div>
                <p class="sign-up">Don't have an Account?<a href="{{ route('register-form') }}"> Sign Up</a></p>
            </form>
        </div>
    </div>
</div>
@stop