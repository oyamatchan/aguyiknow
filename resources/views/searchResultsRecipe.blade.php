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

@stop
@section('body')
<div class="" align="center">
<div class="row">
@foreach($recipes as $recipe)
  <div class="column">
    <div class="card">
    <a href="{{url('/foodPage/'.$recipe->id.'/view')}}">
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
<!-- transfer image hover here, kay di mugana if ibutang sa style section -->
<style>
#myImg:hover {
    -ms-transform: scale(1.2);
    -webkit-transform: scale(1.2);
    transform: scale(1.2); 
    }
    </style>
@stop