<?php

function PrintTableData(){	
			// Database credentials.
			$servername = "localhost";
			$username = "vietduckmt98";
			$dbname = "home";
			$password = "duccode1709";
			// Number of entires to display.
			$display = 15;
			// Create connection.
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			// Get the most recent 10 entries.
			$result = mysqli_query($conn, "SELECT id, dates, times, temp, hum FROM sensordata ORDER BY id DESC LIMIT " . $display . "");
			echo '<table><tr><th>Date</th><th>Time</th><th>Temperature</th><th>Humidity</th><th>Status</th></tr>';
			while($row = mysqli_fetch_assoc($result)) {
				
				$counter =0;
				echo "<tr><td>";
				echo $row["dates"];
				echo "</td><td>";
				echo $row["times"];
				echo "</td><td>";
				echo $row["temp"];
				echo "°C</td><td>";
				echo $row["hum"];
				echo "%</td><td>";
				if($row["temp"] < 15) echo "It's cold and ";
				if($row["temp"] >= 15 && $row["temp"] < 25) echo "It's normal and ";
				if($row["temp"] >= 25) echo "It's hot and ";
				if($row["hum"] < 60) echo "dry !";
				if($row["hum"] >= 60 && $row["hum"] < 90) echo "good !";
				if($row["hum"] >= 90) echo "wet !";
				echo "</td></tr>";
				$counter++;
			}
			
			echo '</table>';
			// Close connection.
			mysqli_close($conn);
}

function PrintChartData() {
			// Database credentials.
			$servername = "localhost";
			$username = "vietduckmt98";
			$dbname = "home";
			$password = "duccode1709";
			// Number of entires to display.
			$display = 10;
			// Create connection.
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			// Get the most recent 10 entries.
			$result = mysqli_query($conn, "SELECT id, dates, times, temp, hum FROM sensordata ORDER BY id DESC LIMIT " . $display . "");
			echo "<script> var data = [";
			while($row = mysqli_fetch_assoc($result)) {
				
				$z = date('Y-m-d H:i:s', strtotime("$row[dates] $row[times]"));

				echo "{ y: '" . $row["times"] . "', a: " . $row["hum"] . ", b: " .$row["temp"] . "},";

				
			}
			echo "];</script>";
			
					
			// Close connection.
			mysqli_close($conn);
}

?>
