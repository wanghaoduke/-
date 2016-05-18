<html>
  <head>
<?php
use App\Te;

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
$id = $_GET['id']; 
 
mysqli_query($conn,"DELETE FROM tasks WHERE id='$id'");
echo '<br><br>delete id:'.$id;
?>
  </head>

<body>
<?php 

?>

</body>
</html>