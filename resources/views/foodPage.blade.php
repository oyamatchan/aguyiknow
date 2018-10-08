@extends('layouts.header')
@section('styles')
#myImg {
    border-radius: 0px;
    cursor: pointer;
    height:450px;
    width:80%;
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

.addRecipe{
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
.foodRecipe{
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

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 60%;
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

.shareRecipe{
  float:right;
  position:relative;
  display:inline-block;
  font-family: "Abel";
    font-size: 100px;
    font-weight: 50px;
    color: white;
    width: 10%;
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

.shareRecipe:hover {
    background: #7de7f6;
    text-decoration: none; 
    color: white;
}
@endsection

@section('body')
<!-- <div class="menu" align="center">
Clever RECIPES
</div> -->
<input type="button"   class="shareRecipe" id="myBtn" value="SHARE RECIPE">

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" align="right">&times;</span>
    <form class="addRecipe" method="POST" autocomplete="off" action="{{url('/shareRecipe/save')}}" enctype="multipart/form-data">
@csrf
    <div class="head">SHARE YOUR RECIPE WITH US </div>
    <br>
    <div class="body">
    <label for="foodName">Give your food a unique name</label>

    <input type="text" name="foodName" class="foodName" id="foodName" placeholder="" required>
    <br>
    <label for="foodQuote">RECIPE</label>
   

    <textarea rows="10" cols="70" name="foodRecipe" id="foodRecipe" class="foodQuote" value="{{ old('foodQuote') }}" required></textarea>

    <label for="foodPicture">Add Picture</label>
    <input id="foodPicture" class="foodPicture" type="file" name="foodPicture" required>
    
    <div align="right">
    <button type="submit" class="button">
      SHARE
    </button>                  
  </div>
  </div>
</form>

</div>
</div>
<div class="" align="center">
<div class="row">

@foreach($recipes as $recipe)
  <div class="column">
    <div class="card">
    <!-- link to view the recipe -->
    <a href="{{url('/foodPage/'.$recipe->rid.'/view')}}">
      <img id="myImg" src="{{$recipe->filename}}">
    </a>
      <div class="container">
        <h2>{{$recipe->foodName}}</h2>
        <p class="title"></p>
        <p><font color="red" size="1"><b>{{ __('Date Posted') }}</b></font> <font color="" size="1">{{date('F d, Y', strtotime($recipe->created_at))}}</font>
</p>
        <p>posted by {{$recipe->firstName}}</p>
        
      </div>
    </div>
  </div>
@endforeach


</div>
</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";

}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<!-- transfer image hover here, kay di mugana if ibutang sa style section -->
<style>
#myImg:hover {
    -ms-transform: scale(1.2);
    -webkit-transform: scale(1.2);
    transform: scale(1.2); 
    }
    </style>
@endsection