@extends('layouts.app')

@section('content')

<?php  
      $servername = "localhost";
      $username = "root";
      $password = "root";
      $dbname = "happy";
// 创建连接
      $conn = new mysqli($servername, $username, $password,$dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } else{
      
      }




?>
<div style="background-color:#D6D0D0;position:absolute;top:100px;width:750px;left:200px;">

<p>
  <?php

     $id=$_REQUEST['id'];
     //$sql = "SELECT title FROM tasks WHERE id=$id";
     $result =  mysqli_query($conn,"SELECT*FROM tasks WHERE id=$id");
     while($row = $result->fetch_assoc()) {
          $title=iconv('GB2312', 'UTF-8', $row['title']);
          $content=iconv('GB2312', 'UTF-8', $row['context']);

     }
  ?>
</p>
<h2 style="position:relative;left:20px"><?php echo $title; ?></h2>
<hr>
<p style="position:relative;left:10px;right: 10px">
  <?php echo $content; ?>
</p>

</div>


@endsection
