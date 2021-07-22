<?php 

include 'function/print-HTML.php';
include 'sql/sql-function.php';
include 'temp/temp-function.php';

$conn = ConnectDatabse();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Le Quy Dai">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home Center</title>

    <!-- CHART -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js'></script>
    <link rel='stylesheet prefetch' href='https://cdn.oesmith.co.uk/morris-0.5.1.css'>
    <link rel="stylesheet" href="temp/temp.css" />

    <!-- CSS -->
    <link href="clock/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/build.css">
    
    <!-- JS -->
    <script type="text/javascript" src="js/jquery/jquery.js"></script>
    <script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="js/query.js"></script>

  </head>
  <body class="lazy-man">
    <!-- Fixed navbar -->
    <div class="container"></div>
    <nav class="navbar navbar-inverse navbar-fixed-top">
            <h1 align="center">Web Server IOT Với Raspberry PI</h1>
      <div class="container">
        <div class="navbar-header">
        </div>
      </div>
    </nav>
    <!-- menu -->
    <div class ="Menu">
              <ul>
                <li><a href="/lazy2">Trang chủ</a></li>
                <li><a href="/lazy2/chart.php">Biểu đồ</a></li>
                <li><a href="/lazy2/showdata.php">Danh sách thiết bị</a></li>
              </ul>
          </div>
    <!-- Conainer -->
    <div class="container">
      <div class="row">
        <div class="land-1">
            <?php

	          PrintObjectDatabase($conn);

            ?>
          <div class="clearfix"></div>

          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="text-center">
              <label class="label label-success"></label>
              <div id="line-chart"></div>
            </div>
	            <div class="clearfix"></div>
          </div>
	
	        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">   

	          <?php

              PrintTableData();

	          ?>

            <div class="clearfix"></div>
          </div>

        
          <?php

            PrintChartData();

          ?>

          <script type="text/javascript" src="temp/temp.js"></script>
          <div class="clearfix"></div>

          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		        <div id="clock" class="light">
			        <div class="display">
				          <div class="weekdays"></div>
				          <div class="ampm"></div>
				          <div class="alarm"></div>
				          <div class="digits"></div>
			        </div>
			        <div class="button-holder">
				          <a id="switch-theme" class="button">Theme</a>
				          <a class="alarm-button button">Alarm</a>
			        </div>
		      </div>


		      <!-- The dialog is hidden with css -->
		      <div class="overlay">
		      	<div id="alarm-dialog">

				      <h2>Open the door after</h2>

				        <label class="hours">
				        	Hours
					        <input type="number" value="0" min="0" />
				        </label>

				        <label class="minutes">
					        Minutes
					        <input type="number" value="0" min="0" />
				          </label>

				        <label class="seconds">
				      	  Seconds
					        <input type="number" value="0" min="0" />
				        </label>

				      <div class="button-holder">
					      <a id="alarm-set" class="button blue">Set</a>
					      <a id="alarm-clear" class="button red">Clear</a>
				      </div>
			      </div>
		      </div>

		      <div class="overlay">
			      <div id="time-is-up">
				      <h2>Door is open!</h2>
				      <div class="button-holder">
					      <a class="button blue">Close</a>
				        </div>
			      </div>
		      </div>

		      <audio id="alarm-ring" preload>
			      <source src="clock/audio/ticktac.mp3" type="audio/mpeg" />
			      <source src="clock/audio/ticktac.ogg" type="audio/ogg" />
		      </audio>

        
		        <!-- JavaScript Includes -->
		
		      <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>
		      <script src="clock/js/script.js"></script>

          </div>

	          <?php
	
	             PrintObjectSend();

	           ?>
            <div class="clearfix"></div>
  
          </div>
      </div>
          
      
    </div>
	  
    <div class="log-box alert alert-danger" role="alert">
		  <strong>Woop !</strong>
		  <p class="log-text">test demo alert log</p>
    </div>

  </body>
</html>

<?php 
	CloseDatabase($conn);
?>

