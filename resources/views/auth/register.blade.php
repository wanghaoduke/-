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
<h3>注册表</h3>
</div>
<div class="panel-body">
<form action="/auth/register" method="post">
   {{csrf_field()}}
<div class="form-group">
用户名：
<input type="text" value='{{ old('name') }}' name="name">
</div>
<div class="form-group">
邮箱：
<input type="email" name="email" value="{{ old('email') }}">
</div>
<div class="form-group">
密码：
        <input type="password" name="password">
</div>
<div class="form-group">
 确认密码：
        <input type="password" name="password_confirmation">
</div>
<button type="submit" class="btn btn-default btn-info">注册</button>
</form>
</div>
</div>
</div>

@endsection