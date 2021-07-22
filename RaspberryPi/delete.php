<?php
$link =new mysqli('localhost','vietduckmt98','duccode1709','home') or die ("Kết nối thất bại!!");
if(isset($_GET['id']))
{ $Name = $_GET['id'];
  $query = "DELETE FROM device WHERE name='$Name'";
  $result = mysqli_query($link, $query) or die ("Xóa dữ liệu thất bại!!!");
  header('location:index.php');
}
?>
