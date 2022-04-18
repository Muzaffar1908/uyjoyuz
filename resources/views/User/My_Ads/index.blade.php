<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>My Ads</title>
</head>
<body>
    <h1 class="text-center">Mening e`lonlarim</h1>

    <div class="card-body"> 
        <a href="{{route('user.index')}}"  class="btn btn-primary btn-sm"><i class="bi bi-arrow-left-short"></i>Back</a>
        <a class="btn btn-primary btn-sm" style="margin-left: 1146px" href="my_ads/create" role="button">E`lon berish</a><br><br>
        <div class="container-fluid">
            <div class="row">
                @foreach($flats as $flat)
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{route('user.my_ads.show', $flat->id)}}">
                                    <img src="{{asset($flat->url)}}" alt="img" width="50%">
                                    {{$flat->name}}
                                </a><br><br>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
    </div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>

