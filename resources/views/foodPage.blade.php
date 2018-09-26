@extends('layouts.header')
@section('styles')
#myImg {
    border-radius: 0px;
    cursor: pointer;
    height:500px;
    width:350px;
    transition: 0.3s;
    padding: 12px 10px 12px 10px;
    
}

.menu{
    font-family: "Dancing Script";
    font-size: 150px;
    font-weight: 700;
    color: #7de7f6;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 12px 10px 12px 10px;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.addQuote{
  border-radius: 5px;
  background-color: #fda6d7;
  margin:10px;
}
label{
  font-family: "Abel";
  font-size: 20px;
  font-weight: 200;
  color: white;
  margin:10px;
}
.head{
  font-family: "Abel";
  font-size: 30px;
  font-weight: 200;
  color: white;
  margin:10px;
}
.body{
  font-family: "Abel";
  font-size: 20px;
  font-weight: 200;
  color: black;
  margin:10px;
}
.foodQuote{
  border: solid #fda6d7 2px ;
  border-radius: 5px;
  margin:10px;
  width: 98%;
}



.button{
    font-family: "Abel";
    font-size: 100px;
    font-weight: 50px;
    color: white;
    width: 120px;
    box-sizing: border-box;
    border: 2px;
    border-radius: 5px;
    font-size: 16px;
    background-color: #7de7f6;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 10px 12px 10px;
    margin:10px;
    display: right;
    text-align: center;
}

.button:hover {
    background: #7de7f6;
    text-decoration: none; 
    color: white;
}

.foodName{
  border: solid #fda6d7 2px ;
  border-radius: 5px;
  margin:10px;
  width: 50%;
}

.foodPicture{
  margin:10px;
}
@endsection

@section('body')
<div class="menu" align="center">
Clever FOOD Quotes
</div>

<div class="" align="center">
<div class="row">

@foreach($quotes as $quote)
  <div class="column">
    <div class="card">
      <img id="myImg" src="{{$quote->filename}}">
      <div class="container">
        <h2>{{$quote->foodName}}</h2>
        <p class="title"></p>
        <p>{{$quote->foodQuote}}-by {{$quote->firstName}}</p>
        
      </div>
    </div>
  </div>
@endforeach

  <div class="column">
    <div class="card">
      <img id="myImg" src="/images/bg1.jpg">
      <div class="container">
        <h2>PINK SMOOTHIE</h2>
        <p class="title"></p>
        <p>The most efficient way to eat healthy and lose fat but still have some fun with it.</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img id="myImg" src="/images/bg3.jpg">
      <div class="container">
        <h2>BELGIAN PEANUT WAFFLE</h2>
        <p class="title"></p>
        <p>Any breakfast is better than no breakfast at all, you can fill your stomach with peanut waffle.</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img id="myImg" src="/images/bg7.jpg">
      <div class="container">
        <h2>BERRY WHITE CAKE</h2>
        <p class="title"></p>
        <p>Cakes have such a terrible habit of turning out bad just when you especially want them to be good.</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img id="myImg" src="/images/bg8.jpg">
      <div class="container">
        <h2>STRAW VERRY DRINK</h2>
        <p class="title"></p>
        <p>Something that's healthy but maybe a little bit more adventurous, if you can see fruit as adventurous.</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img id="myImg" src="/images/bg9.jpg">
      <div class="container">
        <h2>MINI YOYO</h2>
        <p class="title"></p>
        <p>An over near the deli counter that will crunch your hunger into laughter.</p>
      </div>
    </div>
  </div>

    <div class="column">
    <div class="card">
      <img id="myImg" src="/images/bg10.jpg">
      <div class="container">
        <h2>ORANGE SANDWICH</h2>
        <p class="title"></p>
        <p>Rise and shine beautiful. A special sandwich to complete your morning.</p>
      </div>
    </div>
  </div>

    <div class="column">
    <div class="card">
      <img id="myImg" src="/images/bg11.jpg">
      <div class="container">
        <h2>CHARGRILLED BURGER KING</h2>
        <p class="title"></p>
        <p>How well did you know a burger? A burger to overwhelm your hunger.</p>
      </div>
    </div>
  </div>

    <div class="column">
    <div class="card">
      <img id="myImg" src="/images/bg12.jpg">
      <div class="container">
        <h2>VEGETABLE SANDWICH</h2>
        <p class="title"></p>
        <p>Sandwiches are wonderful especially when its filled with vegetable. You don't need a spoon at all.</p>
      </div>
    </div>
  </div>

</div>
</div>

<form class="addQuote" method="POST" autocomplete="off" action="{{url('/shareQuote/save')}}" enctype="multipart/form-data">
@csrf
    <div class="head">SHARE YOUR FOOD THOUGHT WITH US </div>
    <br>
    <div class="body">
    <label for="foodName">Give your food a unique name</label>

    <input type="text" name="foodName" class="foodName" id="foodName" placeholder="" required>
    <br>
    <label for="foodQuote">What's your food clever quote?</label>
   

    <textarea rows="10" cols="200" name="foodQuote" id="quoteDescription" class="foodQuote" value="{{ old('foodQuote') }}" required></textarea>

    <label for="foodPicture">Add Picture</label>
    <input id="foodPicture" class="foodPicture" type="file" name="foodPicture" required>
    
    <div align="right">
    <button type="submit" class="button">
      SHARE
    </button>                  
  </div>
  </div>
</form>

<!-- transfer image hover here, kay di mugana if ibutang sa style section -->
<style>
#myImg:hover {
    -ms-transform: scale(1.2);
    -webkit-transform: scale(1.2);
    transform: scale(1.2); 
    }
    </style>
@endsection