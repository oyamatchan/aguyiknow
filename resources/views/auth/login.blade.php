<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- or css styles fa fa icons -->
    <!-- <link rel="stylesheet" href="/w3css/3/w3.css">   -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <!-- CSRF Token -used para d ma hack or makuha ang data na gipang input sa user sa iyang mga transactions with the site-->
     <meta name="csrf-token" content="{{ csrf_token() }}">
      
    <title>Food Clever</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spirax" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing Script" type="text/css">

<style>
body{
    background-image:url('/images/bg5.jpg');
    background-size:102%;
    background-repeat:no-repeat;
    }

h2,h4{
    font-family: "Dancing Script";
    color:white;
}
.blogname{
    font-family: "Dancing Script";
    font-size: 200px;
    font-weight: 700;
    color: white;
}
.blogname:hover{
    text-decoration:none;
    color: white;
    /* color: #d4b8c8; */
}

.text:hover{
    text-decoration:none;
}
.button{
    font-family: arial,bold;
    font-size: 100px;
    font-weight: 700;
    color: white;
    width: 120px;
    box-sizing: border-box;
    border: 2px;
    border-radius: 5px;
    font-size: 16px;
    background-color: #fda6d7;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 10px 12px 10px;
    display: right;
    text-align: center;
}

.button:hover {
    background: #7de7f6;
    text-decoration: none; 
    color: white;
}
.leftcolumn {   
    float: left;
    width: 69%;
}

.rightcolumn {
    float: right;
    width: 31%;
    padding-right: 20px;
}


.begin {
     background-color: white;
     padding: 20px;
     width: 100%;
     border:2px;
     border-radius:5px;
     /* background-color:white; */
     /* background-color:#ffe3f3; */
     margin-top: 50px;
     margin-bottom: 20px;
}

.beginleft {
     padding: 20px;
     width: 96%;
     /* background-color:#2f4454; */
     /* margin: 20px; */
}
.start:after {
    content: "";
    display: table;
    clear: both;
}

/* The Close Button */
#close{
    float:right;
}

.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

@media screen and (max-width: 800px) {
    .leftcolumn, .rightcolumn {   
        width: 100%;
        padding: 0;
    }
    
}
</style>
<body>
<div class="adminlanding">

<div class="start">

  <div class="leftcolumn">
    <div class="beginleft">
    <div align=center>
    <br>
    <a href="{{url('')}}" class="blogname">Food Clever</a>
    <br><br>
    <h2>
    "Your diet is a bank account. Good food choices are good investments."
    <br>
    <br>
    </h2>
    <div align=right>
    <h4>
    -Bethenny Frankel
    </h4>
    </div>
    </div>
    </div>
  </div>

  <div class="rightcolumn">
    <div class="begin">
    <br>
    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-8">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            </div>
                        </div>

                        <div align="center">
                                @if(session('passwordstatus'))
                                
                                            <div align="center" class="alert alert-danger" id="prompt">
                                                <strong>{{ session('passwordstatus') }}<i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-transparent w3-display-topright" id="close"></i></strong>
                                            </div>
                                @elseif(session('emailstatus'))
                                
                                            <div align="center" class="alert alert-danger" id="prompt">
                                                <strong >{{ session('emailstatus') }}<i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-transparent w3-display-topright" id="close"></i></strong>
                                            </div>
                                @endif
                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <div class="checkbox">
                                     <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                                </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                    </a>
                                
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-6" >
                                <button type="submit" class="button">
                                Log in
                                </button>
                                <br>
                            </div>
                        </div> 
                        <br>
                        <center>
                        <font size="2">Be a member of FOOD Clever </font><a class="text" href="{{ route('register') }}"><font size="2">Join us</font></a>
                        <center>
                        <br> 
                    </form>



            </div>
    
  </div>
  </div>
  
</div>

</div>

</div>
<script>

function w3_close() {
    document.getElementById("prompt").style.display = "none";
}
</script> 
</body>
</html>