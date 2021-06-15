@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Add User</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('users.store') }}">
            @csrf
            <div class="form-group">
                <label>First name</label>
                <input type="text" name="first_name" class="form-control p_input" value="{{old('first_name')}}">
            </div>
            <div class="form-group">
                <label>Last name</label>
                <input type="text" name="last_name" class="form-control p_input" value="{{old('last_name')}}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control p_input" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="1" {{old('gender') == '1'? 'selected':''}}>Male</option>
                    <option value="0" {{old('gender') == '0'? 'selected':''}}>Female</option>
                    <option value="2" {{old('gender') == '2'? 'selected':''}}>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label>Qualification</label>
                <input type="qualification" name="qualification" class="form-control p_input" value="{{old('qualification')}}">
            </div>
            <hr />
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block enter-btn">Submit</button>
            </div>
        </form>
    </div>
</div>
@stop