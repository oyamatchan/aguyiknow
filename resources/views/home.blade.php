@extends('layouts.header')
@section('styles')
.w3-image{max-width:100%;height:10%;}
.w3-display-container{position:relative;}
.w3-display-container:hover span.w3-display-hover{display:inline-block;}
.w3-display-container:hover .w3-display-hover{display:block;}
.w3-content{max-width:980px;margin:auto;}
.w3-center{text-align:center!important;}

.w3-hide-small{display:none!important;}
.w3-xxxlarge{font-size:48px!important;}
@media (max-width:992px) and (min-width:601px){.w3-hide-medium{display:none!important;}}
.w3-display-middle{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%)}
.w3-padding-large{padding:12px 24px!important}

.w3-border{border:1px  #7de7f6!important;}
.w3-wide{letter-spacing:10px;}
<!-- .w3-text-light-grey,.w3-hover-text-light-grey:hover,.w3-text-light-gray,.w3-hover-text-light-gray:hover{color:#f1f1f1!important;} -->
.title1{
    font-family: "Dancing Script";
    font-size: 200px;
    font-weight: 100;
    color: #fda6d7;
}
.title2{
    font-family: "Dancing Script";
    font-size: 175px;
    font-weight: 75;
    color: #7de7f6;
}

.button{
    font-family: arial,bold;
    font-size: 100px;
    font-weight: 700;
    color: #fda6d7;
    box-sizing: border-box;
    border: 2px;
    border-radius: 5px;
    font-size: 100px;
    background-repeat: no-repeat;
    text-align: center;
    display: center;
}

.button:hover {
    text-decoration: none; 
    color: #7de7f6;
}

@endsection

@section('body')

<header class="w3-display-container w3-content w3-center" style="max-width:1350px">
  <img class="w3-image" src="/images/bg4.jpg" alt="food" width="1500" height="400">
  <div class="w3-display-middle w3-padding-large w3-border w3-wide w3-text-light-grey w3-center">
    <h1 class="title1" style="white-space:nowrap">Food</h1>
    <h5 class="title2" style="white-space:nowrap">Clever</h5>
  </div>
  <div class="w3-display-middle w3-padding-large w3-border w3-wide w3-text-light-grey w3-center">
    <div class="foodPage"><a href="{{url('/foodPage')}}" class="button">                        
    <i class="fa fa-chevron-circle-right"></i></a></div>
  </div>

</header>
<!-- transfer style kay dli mu work sa style section for the flashing button-->
<style>
.foodPage{
    padding-left: 900px;
    overflow: auto;
    animation-name:flashing;
    animation-duration:1s;
    animation-timing-function:linear;
    animation-iteration-count:infinite;
}

@keyframes flashing{
    0%{
        opacity:1.0;
    }
    25%{
        opacity:0.6;
    }
    50%{
        opacity:0.3;
    }
    75%{
        opacity:0.6;
    }
    100%{
        opacity:1.0;
    }
}
</style>
@endsection
