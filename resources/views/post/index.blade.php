@extends('layouts.app')

@section('content')
<?php 
use App\Shuju;
?>
  <meta charset="UTF-8">
<title>家网</title>
<style type="text/css">

</style>
  
  <div class="col-md-7 col-md-offset-1 " >  
  <div class="panel panel-default"> 
  <div class="panel-heading text-right">      
  <ul class=" list-inline remove-margin-bottom topic-filter">

    <li>
        <a href="https://phphub.org/topics?filter=recent">
            <i class="glyphicon glyphicon-time"></i> 最近发表
        </a>
        <span class="divider"></span>
    </li>

    <li>
        <a href="https://phphub.org/topics?filter=excellent">
            <i class="glyphicon glyphicon-ok"> </i> 精华主题
        </a>
        <span class="divider"></span>
    </li>

    <li>
        <a href="https://phphub.org/topics?filter=vote">
            <i class="glyphicon glyphicon-thumbs-up"> </i> 最多投票
        </a>
        <span class="divider"></span>
    </li>

    <li>
        <a href="https://phphub.org/topics?filter=noreply">
            <i class="glyphicon glyphicon-eye-open"></i> 无人问津
        </a>
    </li>
</ul>

   </div>

   <div class="panel-body">
     <ul class="list-group" >
            @foreach($pageShujus as $shuju)
            <li class="list-group-item">
             <span class="badge">18</span>
                <a href="{{route('post.show',[$shuju->id])}}">{{$shuju->title}}</a>
                <br>
                 <small>作者：{{Shuju::find($shuju->id)->user->name}}</small>
                
                <form action="{{route('post.destroy',[$shuju->id])}}" method="post">  {{csrf_field()}}  {{method_field('delete')}}
                 <button type="submit"  class="btn btn-danger" >删除文章</button>  
                 </form> 
                </li>
                
              
            @endforeach
            </ul>
   
  

</div>
<div class="panel-footer text-center">
<nav>
  <ul class="pagination">
   @for($i=1;$i<=$pages;$i++)
   <li><a href="{{route('index',[$i])}}">{{$i}}</a></li>
   @endfor   
  </ul>
</nav>
</div>
  </div>
  <br>
   <br>
   <br>
   </div>
 
        
@endsection