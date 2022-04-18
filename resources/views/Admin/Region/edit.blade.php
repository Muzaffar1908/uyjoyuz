@extends('admin.app')
@section('content')

<h1 class="text-center">Change data in the Region table</h1><br>

<div class="card-body">
    
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <a href="{{route('admin.region.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <form action="{{route('admin.region.update', $region->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$region->name}}">
        </div>
    
        <button type="submit" class="btn btn-success">Save</button>
    
    </form>

</div>


@endsection