@extends('admin.app')
@section('content')

<h1 class="text-center">View data in the Around table</h1><br>

<div class="card-body">
    <table class="table">
        <a href="{{route('admin.around.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
        <tr>
            <th>Flat type name</th>
            <td>{{$around->flat_type}}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{$around->name}}</td>
        </tr>
    </table>

</div>


@endsection