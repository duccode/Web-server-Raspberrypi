<?php
//index.php
$connect = mysqli_connect("localhost", "vietduckmt98", "duccode1709", "home");
$query = '
SELECT temp,hum, 
UNIX_TIMESTAMP(CONCAT_WS(" ", dates, times)) AS datetime 
FROM sensordata
ORDER BY dates DESC, times DESC
';
$result = mysqli_query($connect, $query);
$rows = array();
$rows1 = array();
$table = array();
$table1 = array();

$table['cols'] = array(
 array(
  'label' => 'Date Time', 
  'type' => 'datetime'
 ),
 array(
  'label' => 'Temperature (°C)', 
  'type' => 'number'
 )
);

$table1['cols'] = array(
    array(
     'label' => 'Date Time', 
     'type' => 'datetime'
    ),
    array(
     'label' => 'Humidity (%)', 
     'type' => 'number'
    )
   );

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array1 = array();
 $datetime = explode(".", $row["datetime"]);
 $sub_array[] =  array(
      "v" => 'Date(' . $datetime[0] . '000)'
     );
$sub_array1[] =  array(
        "v" => 'Date(' . $datetime[0] . '000)'
       );
$sub_array[] =  array(
      "v" => $row["temp"],
      //"e" => $row["sensors_humidity_data"]
     );
$sub_array1[] =  array(
        //"v" => $row["sensors_temperature_data"],
        "v" => $row["hum"]
       );
 $rows[] =  array(
     "c" => $sub_array
    );
$rows1[] =  array(
        "c" => $sub_array1
   
       );
}
$table['rows'] = $rows;
$table1['rows'] = $rows1;
$jsonTable = json_encode($table);
$jsonTable1 = json_encode($table1);
?>


<html>
 <head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="css/show.css">
  <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   function drawChart()
   {
    var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);

    var options = {
     title:'Temperature Data',
     legend:{position:'bottom'},
     chartArea:{width:'80%', height:'65%'},
	 curveType: 'function'  //Makes line curved
    };

    var chart = new google.visualization.LineChart(document.getElementById('temp_chart'));

    chart.draw(data, options);
   }
  </script>
    <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   function drawChart()
   {
    var data = new google.visualization.DataTable(<?php echo $jsonTable1; ?>);

    var options = {
     title:'Humidity Data',
     legend:{position:'bottom'},
     chartArea:{width:'80%', height:'65%'},
	 curveType: 'function'  //Makes line curved
    };

    var chart = new google.visualization.LineChart(document.getElementById('humi_chart'));

    chart.draw(data, options);
   }
   init_reload();
    function init_reload()
    {
        setInterval(function(){
                window.location.reload();}
                ,360000);
    }
  </script>
  <style>
  .page-wrapper
  {
   width:1000px;
   margin:0 auto;
  }
  .page-wrapper h2{
    font-family: 'Times New Roman';
    font-size: 2em;
  }
  </style>
  <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">  
    <!-- JS -->
    <script type="text/javascript" src="js/jquery/jquery.js"></script>
    <script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="js/query.js"></script>
 </head>  
 <body><div id ="main">
        <div id ="head">
            <h1 align ="center">Biểu đồ thống kê nhiệt độ độ ẩm</h1>
        </div>
        <div id ="menu">
            <ul>
                <li><a href="/lazy2/index.php">Trang chủ</a></li>
                <li><a href="/lazy2/showdata.php">Danh sách thiết bị</a></li>
            </ul>
        </div>
  <div class="page-wrapper">
   <br />
   <div id="temp_chart" style="width: 100%; height: 700px"></div>
   <div id="humi_chart" style="width: 100%; height: 700px"></div>
  </div>
 </body>
</html>
