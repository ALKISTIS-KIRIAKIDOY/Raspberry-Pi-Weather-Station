<?php
// User credintials
$user = 'test';
$password = 'password';
$database = 'test_data';
$servername='localhost:3306';
// Connect to database
$mysqli = new mysqli($servername, $user,$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from table
$sql = "SELECT * FROM WeatherStat ORDER BY ID DESC";
$result = $mysqli->query($sql);
$mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>GFG User Details</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>


<input type ="submit">

	<section>
		<h1>Data Table</h1>
		<!-- TABLE CONSTRUCTION-->
		<table>
			<tr>
				<th>ID</th>
				<th>Temperature1</th>
				<th>Temperature2</th>
				<th>Temperature3</th>
				<th>Temperature</th>
				<th>Humidity1</th>
				<th>Humidity2</th>
				<th>Humidity3</th>
				<th>Humidity</th>
				<th>Time</th>
				<th>Date</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
				<td><?php echo $rows['ID'];?></td>
				<td><?php echo $rows['Temperature1'];?></td>
				<td><?php echo $rows['Temperature2'];?></td>
				<td><?php echo $rows['Temperature3'];?></td>
				<td><?php echo $rows['Temperature'];?></td>
				<td><?php echo $rows['Humidity1'];?></td>
				<td><?php echo $rows['Humidity2'];?></td>
				<td><?php echo $rows['Humidity3'];?></td>
				<td><?php echo $rows['Humidity'];?></td>
				<td><?php echo $rows['Time'];?></td>
				<td><?php echo $rows['Date'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>
</body>

</html>
