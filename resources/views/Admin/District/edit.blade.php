@extends('admin.app')
@section('content')

<h1 class="text-center">Change data in the District table</h1><br>

<div class="card-body">
    <a href="{{route('admin.district.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <form action="{{route('admin.district.update', $district->id)}}" method="POST">
        @csrf
        @method('PUT')
            <input type="hidden" name="id" value="{{$district->id}}">

        <select class="form-select form-control" aria-label="Default select example" name="region_id" required>
            <option value="">Region name is select</option>
            @foreach($regions as $region)
                <option value="{{$region->id}}" <? if($region->id == $district->region_id) echo "selected";?> >{{$region->name}}</option>
            @endforeach
        </select><br>

        <div class="mb-3">
            <label for="name" class="form-label">District name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$district->name}}">
        </div>
    
        <div class="modal-footer d-flex justify-content-between align-content-between">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    
    </form>
</div>


@endsection