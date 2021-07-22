<?php

	// Get values.
	$temp = $_GET['temp'];
	$humid = $_GET['hum'];
	$pass = $_GET['pass'];
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$date= date('Y-m-d');
	$time= date('H:i:s');
	
	// Set password. This is just to prevent some random person from inserting values. Must be consistent with YOUR_PASSCODE in Arduino code.
	$passcode = "123456";
	
	// Check if password is right. (If there is no password, assume no data is trying to be entered and skip over this.)
	if(isset($pass) && ($pass == $passcode)){
		// If all values are present, insert it into the MySQL database.
		if(isset($temp)&&isset($humid)){
			// Database credentials
			$servername = "localhost";
			$username = "root";
			$dbname = "home";
			$password = "";
			// Create connection.
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			// Insert values into table. Replace YOUR_TABLE_NAME with your database table name.
			$sql = "INSERT INTO data (dates, times, temp, humid)
			VALUES ('$date', '$time', '$temp', '$humid')";
			if (mysqli_query($conn, $sql)) {
				echo "OK";
			} else {
				echo "Fail: " . $sql . "<br/>" . mysqli_error($conn);
			}
			
			// Close connection.
			mysqli_close($conn);
		}
	}
?>

<html>
	<head>
		<title>Switch Statuses</title>
		<style>
		html, body{
			background-color: #F2F2F2;
			font-family: Arial;
			font-size: 1em;
		}
		table{
			border-spacing: 0;
			border-collapse: collapse;
			margin: 0 auto;
		}
		th{
			padding: 8px;
			background-color: #FF837A;
			border: 1px solid #FF837A;
		}
		td{
			padding: 10px;
			background-color: #FFF;
			border: 1px solid #CCC;
		}
		
		div.notes{
			font-family: arial;
			text-align: center;
		}
		
		div.current{
			font-size: 58px;
			font-family: arial black;
			text-align: center;
		}
		</style>
	</head>
	<body>
		<?php	
			// Database credentials.
			$servername = "localhost";
			$username = "root";
			$dbname = "home";
			$password = "";
			// Number of entires to display.
			$display = 15;
			// Create connection.
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			// Get the most recent 10 entries.
			$result = mysqli_query($conn, "SELECT id, date, time, temp, humid FROM data ORDER BY id DESC LIMIT " . $display . "");
			echo "<table><tr><th>Date</th><th>Time</th><th>Temperature</th><th>Humidity</th><th>Status</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
			
				echo "<tr><td>";
				echo $row["date"];
				echo "</td><td>";
				echo $row["time"];
				echo "</td><td>";
				echo $row["temp"];
				echo "°C</td><td>";
				echo $row["humid"];
				echo "%</td><td>";
				if($row["temp"] < 15) echo "It's cold and ";
				if($row["temp"] >= 15 && $row["temp"] < 25) echo "It's normal and ";
				if($row["temp"] >= 25) echo "It's host and ";
				if($row["humid"] < 60) echo "dry.";
				if($row["humid"] >= 60 && $row["humid"] < 90) echo "good.";
				if($row["humid"] >= 90) echo "humid.";
				echo "</td></tr>";
				$counter++;
			}
			echo "</table>";
			
			// Close connection.
			mysqli_close($conn);
		?>

		<div class"row">
		      <div class="col-sm-6 text-center">
		        <label class="label label-success">Line Chart</label>
		        <div id="line-chart"></div>
		      </div>
		</div>

		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js'></script>


		<?php	
			// Database credentials.
			$servername = "localhost";
			$username = "root";
			$dbname = "home";
			$password = "";
			// Number of entires to display.
			$display = 15;
			// Create connection.
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			// Get the most recent 10 entries.
			$result = mysqli_query($conn, "SELECT id, date, time, temp, humid FROM data ORDER BY id DESC LIMIT " . $display . "");
			echo "<script> var data = [";
			while($row = mysqli_fetch_assoc($result)) {

				echo "{ y: '" . $row["id"] . "', a: " . $row["temp"] . ", b: " .$row["humid"] . "},";

				$counter++;
			}
			echo "];</script>";
			
					
			// Close connection.
			mysqli_close($conn);
		?>


		<script>
		    config = {
		          data: data,
		          xkey: 'y',
		          ykeys: ['a', 'b'],
		          labels: ['Temperature', 'Humidity'],
		          fillOpacity: 0.6,
		          hideHover: 'auto',
		          behaveLikeLine: true,
		          resize: true,
		          pointFillColors:['#ffffff'],
		          pointStrokeColors: ['black'],
		          lineColors:['gray','red']
		      };

		    config.element = 'line-chart';
		    Morris.Line(config);
		</script>


	</body>
</html>