@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Users</h1>
        <a href="{{route('users.create')}}" class="btn btn-xs btn-primary col-md-2 pull-right">Add</a>
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Qualification</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $record)
                    <tr>
                        <td>{{$record->first_name}}</td>
                        <td>{{$record->last_name}}</td>
                        <td>{{$record->gender && $record->gender == 1 ? 'Male':'Female'}}</td>
                        <td>{{$record->qualification}}</td>
                        <td>{{$record->email}}</td>
                        <td>
                            <a href="{{route('users.edit', $record->id)}}" class="btn btn-primary">Edit</a>&nbsp;&nbsp;
                            @if(!$record->deleted_at)
                            <button class="btn btn-danger delete-user" id="{{$record->id}}">Delete</button>
                            @else
                            <button class="btn btn-success delete-user" id="{{$record->id}}">Restore</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
@section('script')
<script>
    $(function() {
        $(".delete-user").click(function() {
            if (confirm('Are you sure?')) {
                window.location.href = `{{url('users/delete')}}/${$(this).attr('id')}`;
            }
        });
    });
</script>
@stop