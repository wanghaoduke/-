@extends('layouts.app')
@section('content')
<div class="col-md-7 col-md-offset-1 ">


<form  method="post" action="{{route('post.update',[$id])}}">
     {{csrf_field()}}
     {{method_field('put')}}
<p align="center">
  新标题:<input type="text" name="title" />
  </p>
  <p align="center">文章内容更改</p>
  <p align="center"><textarea name="content" rows="10" cols="100"> </textarea> </p>
  <p align="center" ><input type="submit" value="发布" /> </p>
</form>

</div>
@endsection