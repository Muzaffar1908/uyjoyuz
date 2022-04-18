@extends('admin.app')
@section('content')

<h1 class="text-center">Change data in the Comfort table</h1><br>

<div class="card-body">
    <a href="{{route('admin.comfort.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <form action="{{route('admin.comfort.update', $comfort->id)}}" method="POST">
        @csrf
        @method('PUT')

         <select class="form-select form-control" aria-label="Default select example" name="flat_type">
            <option selected>Flat type name is select</option>
            @foreach($flat_types as $flat_type)
                <option value="{{$flat_type->id}}" <? if($flat_type->id == $comfort->id) echo "selected";?> >{{$flat_type->name}}</option>
            @endforeach
        </select>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$comfort->name}}">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    
    </form>

</div>


@endsection