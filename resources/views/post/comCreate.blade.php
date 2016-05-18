@extends('layouts.app')

@section('content')

  <div class="col-md-7 col-md-offset-1 " >  


<form method="get" action="{{route('comStore',[$id])}}">
     {{csrf_field()}}
 
  <p align="center"> 评论内容<textarea  name="content" cols="100" rows="10"> </textarea></p> 
        <p align="center"><input type="submit" style="font-size: 15px" name="提交"/></p>
</form>
</div>


@endsection