@extends('admin.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h1 class="text-center">Users is view</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Login</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($users as $user)
                    <tbody>
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$user->login}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->status}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.user.show', $user->id)}}" type="button" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="{{route('admin.user.edit', $user->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        <a href="{{route('admin.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a>
        </div>
    </div>
</div>

@endsection