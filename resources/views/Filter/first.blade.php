<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <h1 class="text-center p-3">Kvartira jadvalini filtrlash</h1>

        <div class="container">
            
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/flat_type/{id}" method="POST">

                <div class="mb-3">
                    <label for="text" class="form-label"><h5>Nomi</h5></label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <div  class="form-text">Sarlavhani kiriting</div>
                </div>

                <div class="mb-3">
                    <label for=""><h5>Viloyatni tanlang</h5></label><br>
                    <select class="form-select" aria-label="Default select example" name="region" onchange="getdistrict(this.value)" id="viloyat">
                        <option selected>Region this select menu</option>
                        @foreach ($regions as $region)
                            <option value="{{$region->id}}">{{$region->name}}</option>
                        @endforeach
                    </select>
                    <div  class="form-text">Viloyatni tanlang</div>
                </div>

                <div class="mb-3">
                    <label for=""><h5>Tummanni tanlang</h5></label><br>
                    <select class="form-select" aria-label="Default select example" required name="district" id="tuman">
                        <option value="">District this select menu</option>
                        
                    </select>
                    <div  class="form-text">Tummanni tanlang</div>
                </div>
            
            </form>


        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
            
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

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
        </script>
</body>
</html>