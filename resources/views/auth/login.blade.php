@extends('layouts.new')

@section('content')

<div class="col-md-7 col-md-offset-1 " > 
<div class="panel panel-default text-center">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul style="color:red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
<div class="panel-heading">
<h3>登录表</h3>
</div>
<div class="panel-body">
<form action="/auth/login" method="post">
   {{csrf_field()}}
<div class="form-group">
用户名：
<input type="text" value='{{ old('name') }}' name="name">
</div>

<div class="form-group">
密码：
        <input type="password" name="password">
</div>

<button type="submit" class="btn btn-default btn-info">登录</button>
<a role="button" class="btn btn-default btn-info" href="/auth/register">注册</a>
</form>
</div>
</div>
</div>

@endsection