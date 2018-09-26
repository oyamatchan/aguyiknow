<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

     <!-- CSRF Token -used para d ma hack or makuha ang data na gipang input sa user sa iyang mga transactions with the site-->
     <meta name="csrf-token" content="{{ csrf_token() }}">
   
   

    <title>Food Clever</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

    <!-- Styles -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing Script">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
@yield('styles')
#close{
    float:right;
}

.header {
width:100%;
  padding: 7px 5px;
  background: #fda6d7;
  color: white;
}

.text {
  color: white;
  font-style: arial;
  }
.text:hover{
    text-decoration: none; 
    color: #f1f1f1;
  }

body{
    background-color: #f1f1f1;
  top: 500;
  width:100%;
}


.footer {
  padding: 10px 16px;
  background: #2f4454;
  color: #f1f1f1;
  padding-bottom: 50px;
}

/* for icons on header */
.icon-bar a {
    font-family: "Dancing Script";
    font-size: 20px;
    font-weight: 50;
    color: white;
    text-align: center;
    width: 20%; 
    padding: 20px 20px;
}

.icon-bar a:hover {
    background-color: #2f4454; 
    text-decoration: none; 

}

.dropbtn {
    font-family: "Dancing Script";
    font-size: 20px;
    font-weight: 50;
    color: white;
    text-align: center;
    width: 20%;
    padding: 20px 20px;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #2f4454; 

}
/* for the dropdown menu */
.dropdown {
    float: right;
    position: relative;
    display: inline-block;
}


.dropdown-content {
    display: none;
    position: absolute;
    background-color: #2f4454;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    right: 0;
    z-index: 1;
}

.dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.blogname{
    font-family: "Dancing Script";
    font-size: 20px;
    font-weight: 50;
    color: white;
}
.blogname:hover{
    text-decoration:none;
    color: white;
}

/* to transform image shape into circular */
  .profile {
    border-radius: 50%;

    }


.show {display: block;}

 }
</style>
</head>
<body>

<div class="header" id="myHeader">
  
  <div id="app">
  <nav class="navbar navbar-expand-md navbar-light">
  <b><a href="{{url('/home')}}" class="blogname">Food Clever</a></b></font>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="text" href="{{ route('login') }}"><font size="5" >LOGIN</font></a>&emsp;&nbsp;&nbsp;</li>
                            <li><a class="text" href="{{ route('register') }}"><font size="5">REGISTER</font></a></li>
                        @else
                        <div class="icon-bar">
                        <a href="{{url('/home')}}" class="headerText">Home</a>
                        </div>                     
                        
                        </div>

                        <div class="dropdown">
                        <font color="white"> <a onclick="dropdown()" class="dropbtn">
                        @if($picture==null)
                        <img  class="profile" src="{{ asset('images/avatar.png') }}" height="29" width="29"> 
                        @endif

                        @if($picture!=null)
                        <img class="profile" src="{{ $picture->filename }}" height="29" width="29">  
                        @endif
                       {{ Auth::user()->firstName }}</a></font>
                                    

                             <div id="myDropdown" class="dropdown-content">
                                    <!-- link to update profile details -->
                                    @foreach($profile as $profiles)
                                    <a class="dropdown-item" href="{{url('/updateProfile/'.$profiles['id'].'/edit')}}">
                                       
                                        {{ __('Update Profile') }}
                                    </a>
                                    @endforeach
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>



                                    <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>

                            </div>
                        </div>
                            
                        @endguest
                    </ul>
                </div>

                </nav>
            </div> 
</div>

<div class="content">
@yield('body')
</div>


<div>
<!-- menu passed as parameter kay nangayo ang function ug 1 param paras menu bar na mu change -->
<script>
function changeMenu(menu) {
    menu.classList.toggle("change");
}
</script>
<!-- When the user clicks on the button, 
toggle between hiding and showing the dropdown content -->
<script>

function w3_close() {
    document.getElementById("prompt").style.display = "none";
}
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function dropdown() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

@yield('js')

</div>

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