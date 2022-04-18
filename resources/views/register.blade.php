<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!------Font awesome icons link ------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
 
    <div class="register_blok-all">
        @if(session()->has('error')) 
            <div class="alert alert-danger"> 
                {{ session()->get('error') }} 
            </div> 
        @endif

        @if(session()->has('xabar')) 
            <div class="alert alert-success"> 
                {{ session()->get('xabar') }} 
            </div> 
        @endif
        
        <div class="register_blok">
            <form action="adduser" method="POST" class="login active">
                @csrf
                <h3 class="text-center">Registratsiya oynasi</h3><br>

                <div class="form-group">
                    <label for="login">Login</label>
                    <div class="input-group">
                    <input type="text" id="login" oninput="display(this.value)"  name="login" placeholder="Loginni kiriting" value="{{old('login')}}">
                        <i class='bx bx-envelope'></i>
                        <p class="check">Loginni tekshirish</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Parol</label>
                    <div class="input-group">
                        <input type="password" id="password" name="password" placeholder="Parolingizni kiriting" value="{{old('password')}}">
                        <i class='bx bx-lock-alt' ></i>
                    </div>
                    <span class="help-text">Kamida 8 ta belgi</span>
                </div>

                <div class="form-group">
                    <label for="password">Parol</label>
                    <div class="input-group">
                        <input type="password" id="password" name="pass" placeholder="Parolni takrorlang" value="{{old('pass')}}">
                        <i class='bx bx-lock-alt' ></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tel">Telefon nomer</label>
                    <div class="input-group">
                        <input type="number" min="900000000" max="999999999" id="tel" name="phone" placeholder="Telefon raqam 999920266 formatda" value="{{old('phone')}}">
                        <i class='bx bx-lock-alt' ></i>
                    </div>
                </div>

                <button type="submit" class="btn btn-submit">Save</button>
        
            </form>
        </div>

    </div>
<script src="../js/script.js"></script>
<script src="../js/quary.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
<script> 

    function display(login){ 
        iconv_mime_decode_headers = $('#login').val(); // Here, I'm getting selected value of dropdown  
        $.ajax({ 
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            }, 
            url: "{{route('getlogindata')}}", 
            type: "GET", 
            data:{ 
                'log' : login // in header request I'm getting value [productName: plastic product] * 
                }, 
            success:function(data)
            { 
                document.getElementById("check").innerHTML = data;

                if(data=="O'zgartiring")

                document.getElementById("button").disabled = true;

                else
                {
                    document.getElementById("button").disabled = false;
                }

            }, 
            
        }); 
    } 

</script>

</body>
</html>