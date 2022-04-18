@extends('admin.app')
@section('content')

<h1 class="text-center">View data in the Payment type table</h1><br>

<div class="card-body">
    <table class="table">
        <a href="{{route('admin.payment_type.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
        <tr>
            <th>Name</th>
            <td>{{$payment_type->name}}</td>
        </tr>
        <tr>
            <th>Sum</th>
            <td>{{$payment_type->sum}}</td>
        </tr>
    </table>

</div>


@endsection