<?php
$link =new mysqli('localhost','root','','data') or die ("Kết nối thất bại!!");
if(isset($_GET['id']))
{ $Name = $_GET['id'];
  $query = "DELETE FROM test WHERE name='$Name'";
  $result = mysqli_query($link, $query) or die ("Xóa dữ liệu thất bại!!!");
  header('location:index.php');
}
?>