@extends('layouts.app')

@section('content')
<title>{{$shuju->title}}</title>

<div class="col-md-7 col-md-offset-1 " > 

  <div class="panel panel-default">
  <div class="panel-heading">
  <h3 >{{$shuju->title}}</h3>
  <small>作者：{{$name}}</small>
  </div>
  
<div class="panel-body">
  &nbsp;&nbsp;&nbsp;&nbsp;{{$shuju->content}}
<br> <br><p align="center">
<a href="{{route('post.edit',[$id])}}"><button class="btn btn-info" type="button" >编辑修改</button></a> </p>
</div>
  </div>


<div class="panel panel-default" >
<div class="panel-heading">回复数量：{{count($comms)}}</div>
<div class="panel-body">
<dl>
@foreach($comms as $comm)
<dt>&nbsp; 用户：{{$comm->user}} </dt>
<a href="{{route('comDestroy',[$comm->shuju_id,$comm->id])}}"> <button class="btn btn-danger" type="button" style="float: right">删除评论</button></a>

<dd> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$comm->content}}</dd>
<hr>
@endforeach
</dl>
<p align="center"><a href="{{route('comCreate',[$id])}}"> <button class="btn btn-info" type="button">添加评论</button> </a></p>
</div>
</div>



<br><br>
</div>








 

@endsection