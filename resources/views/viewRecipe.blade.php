@extends('layouts.header')
@section('styles')
#myImg {
    border-radius: 0px;
    cursor: pointer;
    height:70%;
    width:100%;
    transition: 0.3s;
    padding: 12px 10px 12px 10px;
    
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

.column {
  float: left;
  width: 50%;
  margin-left: 350px;
  padding: 12px 10px 12px 10px;
}
@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.body{
  font-family: "Abel";
  font-size: 20px;
  font-weight: 200;
  color: black;
  margin:10px;
}

.close{
  float:center;
  color:blue;
}
.close:hover{
  text-decoration:none;
  color: red; 
}
@stop

@section('body')

<div class="">

<div class="row">

<div class="column" >
    <div class="card">
    <a class="close" href="{{url('/foodPage')}}">x</a>

      <img id="myImg" src="{{$recipes->filename}}">
      <div class="container" >
        <center><h2>{{$recipes->foodName}}</h2></center>
        <p class="recipe">
        {{$recipes->foodRecipe}}
        </p>
        <p align="right">posted by {{$recipes->firstName}}</p>
        
      </div>
    </div>
  </div>
</div>
</div>
@stop