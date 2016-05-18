<!DOCTYPE >
    <head>
        <style type="text/css">
          a{TEXT-DECORATION:none}a:hover{TEXT-DECORATION:underline}
        </style>
          <link rel="stylesheet" type="text/css" href="/dist/css/bootstrap.css">
    </head>

    <body  background="/background.jpg">
    <nav class="navbar navbar-default navbar-static-top">
   <div class="col-md-5 col-md-offset-1">
    <a class="navbar-brand">家网</a>
    <ul class="nav navbar-nav">
     <li class="active" role="presentation"> <a href="{{route('index',[1])}}">社区</a></li>
     <li  role="presentation"> <a href="#">招聘</a></li>
     <li  role="presentation"> <a href="#">Wiki</a></li>
     <li  role="presentation"> <a href="#">文档</a></li>
     <li  role="presentation"> <a href="#">LTS速查表</a></li>
     </ul>
    </div>
    <div class="col-md-2 col-md-offset-1 ">
    <form class="navbar-form nav-left" role="search" action="https://phphub.org/search" target="_blank">
    <div class="form-group">
    <input type="text" class="form-control search-input mac-style" placeholder="搜索">
    </div>
    </form>
    </div>

    @if($request->user()==null)
      <div class="col-md-1" >
        <a href="/auth/login/" class="btn btn-info navbar-btn" role="button" >登录</a>
      </div>
      @else
      <div class="col-md-1">
      用户 {{$request->user()->name}} 您好！
      </div>
      <div class="col-md-1">
      <a href="/auth/logout" class="btn btn-danger navbar-btn" role="button">退出登录</a>
      </div>
      @endif
    </nav>
        
      
   
        @yield('content')

  <div class="col-md-3 " >
  <div class="panel panel-default">
  <div class="panel-body">
  <p align="center"> <a class="btn btn-success" style="font-size: 20 " href="{{route('post.create')}}">发&nbsp;布&nbsp;新&nbsp;帖</a> </p>
  </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading text-center">
      社区公告栏
    </div>
    <div class="panel-body">
      <ul class="list">
      <li><a href="">关于 PHPHub </a></li>
      <li><a href="">社区功能引导</a></li>
      <li><a href="">PHPHub 招聘贴发布版规</a></li>
      <li><a href="">社区 维护/驱动 的项目墙</a></li>
    </div>
  </div>
  </div>
    </body>
</html>