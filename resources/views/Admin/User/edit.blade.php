@extends('admin.app')
@section('content')

<h1 class="text-center">Change data in the Users table</h1><br>
<div class="card-body">
    <a href="{{route('admin.user.index')}}" class="btn btn-primary"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
    <form action="{{route('admin.user.update', $user->id)}}"  method="POST"> 
        @csrf  
            @method('PUT')
            
            <div class="form-group"> 
            <label for="login">Login </label> 
            <input type="text" class="form-control" id="login" oninput="display(this.value)"  name="login" placeholder="Loginni kiriting" value="{{$user->login}}"> 
            <p id="check">Loginni tekshirish</p>
            </div> 
            
            
            <div class="form-group"> 
            <label for="tel">Phone</label> 
            <input type="number" min="900000000" max="999999999" class="form-control" id="phone"  name="phone" placeholder="Telefon No'merini Kiriting 999920266 format" value="{{$user->phone}}"> 
            </div> 
    

            <div class="form-group"> 
                <label for="status">Status</label> 
                <input type="text" class="form-control" id="status"  name="status" placeholder="Familyangizni Kiriting" value="{{$user->status}}"> 
            </div>
    
    
            <button type="submit" id="button" class="btn btn-success">Save</button> 
        </form>

</div>

@endsection