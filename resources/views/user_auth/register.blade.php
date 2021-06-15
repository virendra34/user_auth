@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    <h1>Register</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label>Firstname</label>
                <input type="text" name="first_name" class="form-control p_input" value="{{old('first_name')}}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control p_input" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control p_input">
            </div>
            <hr />
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
            </div>

            <p class="sign-up text-center">Already have an Account?<a href="{{ route('login-form') }}"> Sign In</a></p>
            <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
        </form>
    </div>
</div>
@stop