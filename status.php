<!DOCTYPE html>
<html>
<head>
	<title>train Status</title>
	<LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style type="text/css">
		#check	{
			font-size: 20px;
			background-color: white;
			width: 100%;
			height: 500px;
			margin: auto;
			border-radius: 25px;
			border: 3px solid green;
			margin: auto;
  			position: absolute;
  			left: 0;
  			right: 0;
  			padding-top: 40px;
  			padding-bottom:20px;
  			margin-top: 130px;

		}
		html {
		  background: url(images/bg4.jpg) no-repeat center center fixed;
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#pnrtext	{
			padding-top: 20px;
		}
	</style>
</head>
<body>
<?php
session_start();
include("header.php"); ?>
<center>
	<div id="check"><h1>The train's available for today:</h1><br/><br/>

	<div class="table-scrol">
    <div class="table-responsive">
				<table>
					<tr>
						<th>train number</th>
						<th>train name</th>
						<th>train destination</th>
						<th>train source</th>
						<th>train type</th>
						<th>no of seats</th>
						<th>price</th>
						<th>departure time</th>
						<th>arrival time</th>
					</tr>
					<?php
					$conn = mysqli_connect("localhost","root","","railway");
					if($conn-> connect_error){
						die("Connection Error". $conn-> connect_error);
					}

					$sql = "SELECT * from trains,pricing,timing where trains.t_no=pricing.t_no and trains.t_no=timing.t_no";
					$result = $conn-> query($sql);

					if($result-> num_rows>0){
						while ($row = $result-> fetch_assoc()){
							echo("<tr><td>". $row["t_no"]."</td><td>". $row["t_name"]."</td><td>". $row["t_destination"]."</td><td>".$row["t_source"]."</td><td>". $row["t_type"]."</td><td>". $row["no_seats"]."</td><td>". $row["pricing"]."</td><td>"
							. $row["departure_time"]."</td><td>". $row["arival_time"]."</td></tr>");
						}
						echo "</table>";
					}
					else{
						echo"0 result";
					}
					$conn->close();
					 ?>
				</table>
        </div>
</div>
	</div>
</center>
</body>
</html>
