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
      

    <title>Update Account</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spirax" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing Script" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   

<style>
body{
    background-image: url("/images/bg4.jpg");
    background-size:100%;
    background-repeat: no-repeat;
    }

.footer {
  padding: 10px 16px;
  background: #2f4454;
  color: #f1f1f1;
  padding-bottom: 50px;
}
.blogname{
    font-family: "Dancing Script";
    font-size: 100px;
    font-weight: 700;
    color: white;
}
.blogname:hover{
    text-decoration:none;
    color: white;
    /* color: #d4b8c8; */
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

.card-header{
    background: #7de7f6;
}
</style>



<body>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div align="center" class="card-header">
                <a href="" class="blogname">Food Clever</a>
                </div>
                <div class="card-body">
                    <form method="POST" autocomplete="off" action="{{url('/updateProfile/'.$profile['id'].'/save')}}" enctype="multipart/form-data">
                        @csrf
    <center><font size="2"><b>Fields marked with </b></font><font size="4" color="red"><b>*</b></font><font size="2"><b> are fillable informations.</b></font></center><br>
    

                        
                        <div class="form-group row">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }} <font size="3" color="red"><b>*</b></font></label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control" name="firstName" value="{{ $profile->firstName }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }} <font size="3" color="red"><b>*</b></font></label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control" name="lastName" value="{{ $profile->lastName }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}<font size="3" color="red"><b>*</b></font></label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $profile->address }}" required>
                            </div>
                        </div>                 

                        <div class="form-group row">
                            <label for="contactNumber" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}<font size="3" color="red"><b>*</b></font></label>

                            <div class="col-md-6">
                                <input id="contactNumber" type="text" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contactNumber" value="{{ $profile->contactNumber }}" required>

                                @if ($errors->has('contact'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}<font size="3" color="red"><b>*</b></font></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$profile->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        </div>

                        <div class="form-group row">
                            <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Change picture') }}</label>

                            <div class="col-md-6">
                                <input id="picture" type="file" name="picture">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4" align="center">
                                <button type="submit" class="button">
                                    {{ __('Save') }}
                                </button>
                                <a class="text" href="{{ route('home') }}"><font size="2">Cancel</font></a>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<div class="footer">
<footer class="w3-container w3-padding-64 w3-center w3-black w3-xlarge" align="center">
  <br>
  <a href="#"><i class="fa fa-facebook-official" style="color:white"> </i></a>
  <a href="#"><i class="fa fa-pinterest-p" style="color:white"> </i></a>
  <a href="#"><i class="fa fa-twitter" style="color:white"> </i></a>
  <a href="#"><i class="fa fa-flickr" style="color:white"> </i></a>
  <a href="#"><i class="fa fa-linkedin" style="color:white"></i></a>
  <br>
  <p class="w3-medium">
  All rights reserved 2018 <a href="https://www.foodclever.com" style="color:white">foodclever.com</a>
  </p>
</footer>
</div>
</body>
</html>
