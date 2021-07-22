<?php
include(‘phpgraphlib.php’);
include(‘phpgraphlib_pie.php’);
$graph = new PHPGraphLibPie(1000,500);
 
$servername = ‘localhost’;
$username = ‘root’;
$password = ‘root’;
$dbname = ‘home’;
 
$sql = “Select * from JSDataTable where mood = ‘Happy’”;
$sql1 = “Select * from JSDataTable where mood = ‘Sad’”;
$sql2 = “Select * from JSDataTable where mood = ‘Angry’”;
$sql3 = “Select * from JSDataTable where mood = ‘Neutral’”;
 
$conn = mysql_connect(“localhost”, “username”, “password”) or die (“Fail”);
mysql_select_db(“dbname”, “$conn”);
 
$result = mysql_query($sql, $conn);
$result1 = mysql_query($sql1, $conn);
$result2 = mysql_query($sql2, $conn);
$result3 = mysql_query($sql3, $conn);
 
$tothappy = mysql_num_rows($result);
$totsad = mysql_num_rows($result1);
$totangry = mysql_num_rows($result2);
$totneutral = mysql_num_rows($result3);
 
$data = array(“Happy” => $tothappy, “Sad” => $totsad, “Angry” => $totangry, “Neutral” => $totneutral);
 
$graph->addData($data);
$graph->setLabelTextColor(“black”);
$graph->setLegentTextColor(“black”);
$graph->setBackgroundColor(“pastel_green_1”);
$graph->createGraph();
 
mysql_close($conn);
?>