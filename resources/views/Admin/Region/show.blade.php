@extends('admin.app')
@section('content')

<h1 class="text-center">View data in the Region table</h1><br>

<div class="card-body">
    <table class="table">
        <a href="{{route('admin.region.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
        <tr>
            <th>Name</th>
            <td>{{$region->name}}</td>
        </tr>
    </table>

</div>


@endsection