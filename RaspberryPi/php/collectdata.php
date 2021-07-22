<?php
$servername = “localhost”;
$username = “root”;
$password = “”;
$dbname = “home”;
 
$mood = $_GET[‘mood’];
$conn = mysql_connect(“localhost”,”username”,”password”);
if(!$conn)
{
die(‘Could not connect: ’ . mysql_error());
}
$datenow = date(‘Y-m-d’);
$sql = “INSERT INTO `JSDataTable`(`logdate`,`mood`) VALUES (\”$datenow\”,\”$mood\”)”;
$result = mysql_query($sql);
if(!result)
{
die(‘Invalid query: ‘ . mysql_error());
}
echo “<h1>The data has been sent!</h1>”;
mysql_close($conn);
?>