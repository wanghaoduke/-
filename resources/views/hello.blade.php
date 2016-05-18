@extends('layouts.app')

@section('content')
<title>主题列表 PHPHub - PHP & Laravel的中文社区</title>
<style type="text/css">

ul.listtou{
    list-style-type: none;


}
li.lizhu{font-size:15px;height:35;
}
ul.listzhu{
    list-style-type: none;

}
li.litou{float:right; width:70px;font-size:12px;}

</style>

        
<div style="background-color:#D6D0D0;position:absolute;top:100px;width:750px;left:200px;">
    

<ul class="listtou">
 <li class='litou'>
        <a href="https://phphub.org/topics?filter=recent">
            <i class="glyphicon glyphicon-time"></i> 最近发表
        </a>
        <span class="divider"></span>
    </li>

    <li class='litou'>
        <a href="https://phphub.org/topics?filter=excellent">
            <i class="glyphicon glyphicon-ok"> </i> 精华主题
        </a>
        <span class="divider"></span>
    </li>

    <li class='litou'>
        <a href="https://phphub.org/topics?filter=vote">
            <i class="glyphicon glyphicon-thumbs-up"> </i> 最多投票
        </a>
        <span class="divider"></span>
    </li>
   
    <li class='litou'>
        <a href="https://phphub.org/topics?filter=noreply">
            <i class="glyphicon glyphicon-eye-open"></i> 无人问津
        </a>
    </li>
    

</ul>
<div >
<br>
<ul class='listzhu'>
<?php  

      $servername = "localhost";
      $username = "root";
      $password = "root";
      $dbname = "happy";
// 创建连接
      $conn = new mysqli($servername, $username, $password,$dbname);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 
      
  $sql = "SELECT id, title, context FROM tasks";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
        
        echo '<li class="lizhu"><a onclick="toUrl('.$row['id'].')"><hr>'.iconv('GB2312', 'UTF-8', $row['title']).'</a></li>';
        }}
        echo "<hr>";
?>
 

  
  


</ul>
</div>

</div>   

<script>
  function toUrl(id){
    //alert(id);
    
    window.location ="./newshow?id="+id;

    //  Ajax
    //document.write("<div>alsdkfoakdfsl</div>");
  }
</script>

           
 
@endsection