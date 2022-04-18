@extends('admin.app')
@section('content')


<h1 class="text-center">View data in the Users table</h1><br>

<div class="card-body">
    <table class="table">
        <a href="{{route('admin.user.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
        <tr>
            <th>Firstname</th>
            <td>{{$user->firstname}}</td>
        </tr>
        <tr>
            <th>Lastname</th>
            <td>{{$user->lastname}}</td>
        </tr>
        <tr>
            <th>Login</th>
            <td>{{$user->login}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{$user->phone}}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{$user->status}}</td>
        </tr>
    </table>

</div>

@endsection