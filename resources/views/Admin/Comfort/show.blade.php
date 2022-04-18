@extends('admin.app')
@section('content')

<h1 class="text-center">View data in the Comfort table</h1><br>

<div class="card-body">
    <table class="table">
        <a href="{{route('admin.comfort.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
        <tr>
            <th>Flat type name</th>
            <td>{{$comfort->flat_type}}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{$comfort->name}}</td>
        </tr>
    </table>

</div>


@endsection