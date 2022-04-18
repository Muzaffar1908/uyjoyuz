<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Show title</title>
</head>
<body>

    <h1 class="text-center p-3">User kiritgan ma`lumotlarni ko`rish</h1>

    <div class="card-body">
        
        <a href="{{route('user.my_ads.index')}}" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left-short"></i>Back</a><br><br>
        <a href="{{route('user.my_ads.edit', $flat->id)}}" type="button" class="btn btn-success btn-sm" style="margin:0 0 15px 1245px"><i class="bi bi-pencil"></i>  Edit</a>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{asset($flat->url)}}" alt="img" width="50%">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Uy turi</th>
                                    <td>{{$flat->flat_type}}</td>
                                </tr>
                                <tr>
                                    <th>Nomi</th>
                                    <td>{{$flat->name}}</td>
                                </tr>
                                <tr>
                                    <th>Viloyat</th>
                                    <td>{{$flat->region}}</td>
                                </tr>
                                <tr>
                                    <th>Tumani</th>
                                    <td>{{$flat->district}}</td>
                                </tr>
                                <tr>
                                    <th>Xonalar soni</th>
                                    <td>{{$flat->number_of_rooms}}</td>
                                </tr>
                                <tr>
                                    <th>Xonalarni  kvadirati</th>
                                    <td>{{$flat->square}}</td>
                                </tr>
                                <tr>
                                    <th>Etaj</th>
                                    <td>{{$flat->floor}}</td>
                                </tr>
                                <tr>
                                    <th>Uyning qavati</th>
                                    <td>{{$flat->flat_floor}}</td>
                                </tr>
                                <tr>
                                    <th>Tolov turi</th>
                                    <td>{{$flat->payment_type}}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{$flat->price}}</td>
                                </tr>
                                <tr>
                                    <th>Comment</th>
                                    <td>{{$flat->comment}}</td>
                                </tr>
                                <tr>
                                    <th>Telefon raqami</th>
                                    <td>{{$flat->phone}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        


    </div>

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>