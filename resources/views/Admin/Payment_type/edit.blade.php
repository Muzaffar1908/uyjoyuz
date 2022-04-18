@extends('admin.app')
@section('content')

<h1 class="text-center">Change data in the Payment type table</h1><br>

<div class="card-body">
    <a href="{{route('admin.payment_type.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <form action="{{route('admin.payment_type.update', $payment_type->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$payment_type->name}}">
        </div>
    
        <div class="mb-3">
            <label for="sum" class="form-label">Sum</label>
            <input type="text" name="sum" class="form-control" id="sum" value="{{$payment_type->sum}}">
        </div>
    
        <button type="submit" class="btn btn-success">Save</button>
    
    </form>

</div>


@endsection