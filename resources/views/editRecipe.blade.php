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


@endsection

@section('body')
<form class="addRecipe" method="POST" autocomplete="off" action="{{url('/recipe/'.$recipes['rid'].'/update')}}" enctype="multipart/form-data">
@csrf
    <div class="head">UPDATE RECIPE</div>
    <br>
    <div class="body">
    <label for="foodName">Give your food a unique name</label>

    <input type="text" name="foodName" class="foodName" id="foodName" value={{$recipes['foodName']}} required>
    <br>
    <label for="foodRecipe">RECIPE</label>
   

    <textarea rows="10" cols="125" name="foodRecipe" id="foodRecipe" class="foodQuote" value="{{ old('foodRecipe') }}" required>{{$recipes['foodRecipe']}}</textarea>

    
    <div align="right">
    <button type="submit" class="button">
      UPDATE
    </button>                  
  </div>
  </div>
</form>

@endsection