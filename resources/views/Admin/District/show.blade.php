@extends('admin.app')
@section('content')

<h1 class="text-center">View data in the District table</h1><br>

<div class="card-body">
    <a href="{{route('admin.district.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <table class="table">
        <tr>
            <th>Region name</th>
            <td>{{$district->region_id}}</td>
        </tr>
        <tr>
            <th>District name</th>
            <td>{{$district->name}}</td>
        </tr>
    </table>

</div>

@endsection