
<html >
  <head >
  <meta charset="utf-8">
<?php
use App\Task;

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "happy";
// 创建连接
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
  </head>

<body>
  <br>
  <br>
<?php 
  $task=new Task; 
  $sql = "SELECT id, title, context FROM tasks";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {



        echo "<br> <br>id: ". $row["id"]. " - title: ".  iconv('GB2312', 'UTF-8', $row['title']). " <br><br>content " . iconv('GB2312', 'UTF-8', $row['context']);
        echo"<br><br>";
    }
  } else {
    echo "0 results";
}
?>
<br>
<br>

<form method="get" action="/del" >
你想删除的文章的id为：<input type="text" name="id"/>
<input type="submit" value="确认"/>
</form>


</body>


</html>