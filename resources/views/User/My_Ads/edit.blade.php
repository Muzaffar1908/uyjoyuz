<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Edit ttile</title>
</head>
<body>
    <?
    $i=0;
    ?>
    <h1 class="text-center p-3">User kiritgan ma`lumotlarni o`zgartirish</h1>

    <div class="container">
        <a href="{{route('user.my_ads.index')}}" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form action="{{route('user.my_ads.update', $flat->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for=""><h5>Uy turi</h5></label><br>
                <select class="form-select" aria-label="Default select example" name="flat_type" onchange="getaround(this.value); getcomfort(this.value)" id="atrofida">
                    <option>Open this select menu....</option>
                    @foreach($flat_types as $flat_type)
                        <option value="<?= $flat_type->id?>" <?php if($flat_type->id == $flat->flat_type) echo "selected";?> >
                                {{$flat_type->name}}
                        </option>
                    @endforeach 
                </select>
                <div  class="form-text">Uy turini tanlang</div>
            </div>

            <div class="mb-3">
                <label for="text" class="form-label"><h5>Nomi</h5></label>
                <input type="text" class="form-control" id="name" name="name" required value="{{$flat->name}}">
                <div  class="form-text">Sarlavhani kiriting</div>
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Ijara Sotuv</label>
                <select class="form-control" name="rent_and_sale" id="rent_and_sale">
                    <option value="">Tanlang...</option>
                    <option value="1" <?php if($flat->type == 1) echo "selected"?>>Ijara</option>
                    <option value="2" <?php if($flat->type == 2) echo "selected"?>>Sotuv</option>                                        
                
                </select>
            </div>

            <div class="mb-3">
                <label for=""><h5>Viloyatni tanlang</h5></label><br>
                <select class="form-select" aria-label="Default select example" name="region" onchange="getdistrict(this.value)" id="viloyat">
                    <option selected>Region this select menu....</option>
                    @foreach ($regions as $region)
                        <option value="{{$region->id}}"  <? if($region->id == $flat->region)  echo "selected"; ?>>{{$region->name}}</option>
                    @endforeach
                </select>
                <div  class="form-text">Viloyatni tanlang</div>
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Tuman</label>
                <select class="form-control" required name="district" id="tuman">
                <option value="">Tanlang...</option>
                @foreach($districts as $district)
                    <option value="{{$district->id}}" <? if($district->id == $flat->district) echo "selected";?>>
                            {{$district->name}}
                    </option>
                @endforeach
                
                </select>
                <div  class="form-text">Tumanni tanlang</div>
            </div>

            <label for="text" class="form-label"></label>
            <p id="component" onload="getcomponent(<?=$flat->flat_type;?>)">Component</p>

    
            <div class="mb-3">
                <label for="text" class="form-label">Uyning atrofida bor narsalar</label>
                    <div id="addElementsHere" class="form-check form-switch">
                        @foreach($arounds as $around)
                            <input class="form-check-input" type="checkbox" id="n{{$i}}" name="around{{ $i }}" value="{{$around->id}}" checked="true">
                            <label for="n{{$i}}">{{$around->name}}</label><br>
                            <? $i++;?>
                        @endforeach

                        @foreach($all_arounds as $alln)
                            <?$check=1;?>
                            <?php foreach($arounds as $around)
                                
                                    if($around->id == $alln->id)
                                    {
                                        $check=0;
                                    }

                            ?>
                            @if($check==1)
                            <input class="form-check-input" type="checkbox" id="n{{$i}}" name="around{{$i}}" value="{{$around->id}}">
                            <label for="n{{$i}}">{{$alln->name}}</label><br>
                            <? $i++;?>
                            @endif
                        @endforeach
                    </div>
            </div>

            <input type="hidden" name="maxsoni1" id="maxsoni1">

            <div class="mb-3">
                <label for="text" class="form-label">Uyning ichida bor narsalar</label>
                    <div id="addElementsHerecomfort" class="form-check form-switch">
                        
                    </div>
            </div>

            <input type="hidden" name="maxsoni2" id="maxsoni2">

        
             <div class="mb-3">
                <label for="text" class="form-label"><h5>Tolov turi</h5></label>
                <select class="form-control" required name="payment_type">
                <option value="">Tanlang...</option>
                @foreach($payment_types as $payment_type)
                    <option value="{{$payment_type->id}}" <? if($payment_type->id == $flat->payment_type) echo "selected";?> >
                            {{$payment_type->name}}
                    </option>
                @endforeach 
                </select>
                <div  class="form-text">Dollor yoki so'mda</div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label"><h5>Narxi</h5></label>
                <input type="text" class="form-control" id="price" name="price" required value="{{$flat->price}}">
                <div  class="form-text">Uyning narxi.</div>
            </div>

            <div class="mb-3">
                <label for="comment" class="form-label"><h5>Comment</h5></label>
                <textarea class="form-control" id="comment" name="comment" rows="5">value="{{$flat->comment}}"</textarea>
                <div  class="form-text">Qo'shimcha ma'lumotlar</div>
            </div>

            <div class="mb-3">
                <label for="text" class="form-label"><h5>Telefon nomer</h5></label>
                <input type="number" min="900000000" max="999999999" placeholder="Phone number format 999920266" class="form-control" id="phone" name="phone" required  value="{{$flat->phone}}">
                <div  class="form-text">Telefon raqam kiriting</div>
            </div>

            <button type="submit" class="btn btn-success">Save</button>




        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 

<script>
    function getdistrict(id){ 
        iconv_mime_decode_headers = $('#viloyat').val(); // Here, I'm getting selected value of dropdown  
        $.ajax({ 
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            url: "{{route('getdistrict')}}", 
            type: "GET", 
            data:{ 
                'id' : id // in header request I'm getting value [productName: plastic product] * 
                }, 
            success:function(district){ 
                var selectobject = document.getElementById("tuman");
                for (var i=1; i<selectobject.length; i++) {
                    selectobject.remove(i);
                }
                $(district).each(function(){
                    $("#tuman").append($('<option>', {
                        value: this.id,
                        text: this.name,
                    }));
                })


            }, 
                
        }); 
    } 

    function getaround(id){ 
        iconv_mime_decode_headers = $('#atrofida').val(); // Here, I'm getting selected value of dropdown  
        $.ajax({ 
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            url: "{{route('getaround')}}", 
            type: "GET", 
            data:{ 
                'id' : id // in header request I'm getting value [productName: plastic product] * 
                }, 
            success:function(around){ 
                    console.log(around);
                n = around.length;
                document.getElementById("maxsoni1").value=n;
                for(var i = 0; i<n; i++){
                        $("#addElementsHere")
                        .append(`<input class="form-check-input" type="checkbox" id="${i}" name="around${i}" value="${around[i].id}">`)
                        .append(`<label for="${i}">${around[i] .name}</label></div>`)
                        .append(`<br>`);
                }

                }


            
            
        })
    } 


    function getcomfort(id){ 
        iconv_mime_decode_headers = $('#atrofida').val(); // Here, I'm getting selected value of dropdown  
        $.ajax({ 
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            url: "{{route('getcomfort')}}", 
            type: "GET", 

            data:{ 
                'id' : id // in header request I'm getting value [productName: plastic product] * 
                }, 
            success:function(comfort){ 
                
                n = comfort.length;
                document.getElementById("maxsoni2").value=n;
                for(var i = 0; i<n; i++){
                        $("#addElementsHerecomfort")
                        .append(`<input class="form-check-input" type="checkbox" id="${i}" name="comfort${i}" value="${comfort[i].id}">`)
                        .append(`<label for="${i}">${comfort[i] .name}</label></div>`)
                        .append(`<br>`);
                }

                }


            
                
        })
            
    } 

    function getcomponent(id)
    {

        document.getElementById("addElementsHerecomponent").innerHTML = "";

            if(id == 1)
            {
                $("#addElementsHerecomponent")
            
                .append(`<label for="number_of_rooms">Xonalari soni</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="number_of_rooms" id="number_of_rooms">`)
                .append(`<br>`)
                .append(`<label for="square">Kvadrati</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="square" id="square">`)
                .append(`<br>`)
                .append(`<label for="floor">Etaj</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="floor" id="floor">`)
                .append(`<br>`)
                .append(`<label for="flat_floor">Uyning qavati</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="flat_floor" id="flat_floor">`)
                .append(`<br>`)
            }

            else if(id == 2)
        {
            
                $("#addElementsHerecomponent")
                .append(`<label for="number_of_rooms">Xonalari soni</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="number_of_rooms" id="number_of_rooms">`)
                .append(`<br>`)
                .append(`<label for="square">Kvadrati</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="square" id="square">`)
                .append(`<br>`)
                .append(`<label for="floor">Etaj</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="floor" id="floor">`)
                .append(`<br>`)
                .append(`<label for="flat_floor">Uyning qavati</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="flat_floor" id="flat_floor">`)
                .append(`<br>`)

        }

        else if(id == 3)
        {
            
                $("#addElementsHerecomponent")
                .append(`<label for="number_of_rooms">Xonalari soni</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="number_of_rooms" id="number_of_rooms">`)
                .append(`<br>`)
                .append(`<label for="square">Kvadrati</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="square" id="square">`)
                .append(`<br>`)
                .append(`<label for="floor">Etaj</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="floor" id="floor">`)
                .append(`<br>`)
                .append(`<label for="flat_floor">Xonaning  qavati</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="flat_floor" id="flat_floor">`)
                .append(`<br>`)

        }

        else if(id == 4)
        {
            
                $("#addElementsHerecomponent")
                .append(`<label for="number_of_rooms">Xonalari soni</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="number_of_rooms" id="number_of_rooms">`)
                .append(`<br>`)
                .append(`<label for="square">Kvadrati</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="square" id="square">`)
                .append(`<br>`)
                .append(`<label for="floor">Etaj</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="floor" id="floor">`)
                .append(`<br>`)
                .append(`<label for="flat_floor">Uyning  qavati</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="flat_floor" id="flat_floor">`)
                .append(`<br>`)

        }

        else if(id == 5)
        {
                
                $("#addElementsHerecomponent")
                .append(`<label for="number_of_rooms">Xonalari soni</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="number_of_rooms" id="number_of_rooms">`)
                .append(`<br>`)
                .append(`<label for="square">Kvadrati</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="square" id="square">`)
                .append(`<br>`)
                .append(`<label for="floor">Etaj</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="floor" id="floor">`)
                .append(`<br>`)
                .append(`<label for="flat_floor">Uyning  qavati</label>`)
                .append(`<input class="form-control" type="number" min='0'  name="flat_floor" id="flat_floor">`)
                .append(`<br>`)

        }
    }

</script>

<script>
        var  id = document.getElementById('atrofida').value;
        document.getElementById("addElementsHerecomponent").innerHTML = "";

if(id == 1)
{
    $("#addElementsHerecomponent")

    .append(`<label for="number_of_rooms">Xonalari soni</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="number_of_rooms" id="number_of_rooms" value="<?=$flat->number_of_romms;?>">`)
        .append(`<br>`)
    .append(`<label for="square">Kvadrati</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="square" id="square">`)
        .append(`<br>`)
    .append(`<label for="floor">Etaj</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="floor" id="floor">`)
        .append(`<br>`)
    .append(`<label for="flat_floor">Uyning qavati</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="flat_floor" id="flat_floor">`)
        .append(`<br>`)
}

else if(id == 2)
{

    $("#addElementsHerecomponent")
    .append(`<label for="number_of_rooms">Xonalari soni</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="number_of_rooms" id="number_of_rooms">`)
        .append(`<br>`)
    .append(`<label for="square">Kvadrati</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="square" id="square">`)
        .append(`<br>`)
    .append(`<label for="floor">Etaj</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="floor" id="floor">`)
        .append(`<br>`)
    .append(`<label for="flat_floor">Uyning qavati</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="flat_floor" id="flat_floor">`)
        .append(`<br>`)

}

else if(id == 3)
{

    $("#addElementsHerecomponent")
    .append(`<label for="number_of_rooms">Xonalari soni</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="number_of_rooms" id="number_of_rooms">`)
        .append(`<br>`)
    .append(`<label for="square">Kvadrati</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="square" id="square">`)
        .append(`<br>`)
    .append(`<label for="floor">Etaj</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="floor" id="floor">`)
        .append(`<br>`)
    .append(`<label for="flat_floor">Xonaning  qavati</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="flat_floor" id="flat_floor">`)
        .append(`<br>`)

}

else if(id == 4)
{

    $("#addElementsHerecomponent")
    .append(`<label for="number_of_rooms">Xonalari soni</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="number_of_rooms" id="number_of_rooms">`)
        .append(`<br>`)
    .append(`<label for="square">Kvadrati</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="square" id="square">`)
        .append(`<br>`)
    .append(`<label for="floor">Etaj</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="floor" id="floor">`)
        .append(`<br>`)
    .append(`<label for="flat_floor">Uyning  qavati</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="flat_floor" id="flat_floor">`)
        .append(`<br>`)

}

else if(id == 5)
{
    
    $("#addElementsHerecomponent")
    .append(`<label for="number_of_rooms">Xonalari soni</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="number_of_rooms" id="number_of_rooms">`)
        .append(`<br>`)
    .append(`<label for="square">Kvadrati</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="square" id="square">`)
        .append(`<br>`)
    .append(`<label for="floor">Etaj</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="floor" id="floor">`)
        .append(`<br>`)
    .append(`<label for="flat_floor">Uyning  qavati</label>`)
    .append(`<input class="form-control" type="number" min='0'  name="flat_floor" id="flat_floor">`)
        .append(`<br>`)

}
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>