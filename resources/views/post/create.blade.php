@extends('layouts.app')

@section('content')


  <div class="col-md-7 col-md-offset-1 " > 


      <form  method="get" action="{{route('wenStore')}}" >
                 {{csrf_field()}}

        <p align="center">标题为：<input type='text' name="title"/></p>
        <p align="center">文章内容为：</p>
        <p align="center"><textarea  name="content" cols="100" rows="10"> </textarea></p> 
        <p align="center"><input type="submit" style="font-size: 15px" name="提交"/></p>
      </form>
    </div> 

@endsection