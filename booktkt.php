<?php
session_start();
	if(empty($_SESSION['user_info'])){
		echo "<script>alert('Please Log In First');
		document.location='login.php'</script>";
	}
$conn = mysqli_connect("localhost","root","","railway");
if(!$conn){
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());
}
if (isset($_POST['submit']))
{
	if(!empty($_POST['fname'])&& !empty($_POST['lname'])&& !empty($_POST['num'])&& !empty($_POST['trains'])){
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$num=$_POST['num'];
	$trains=$_POST['trains'];
	$booking_date=htmlentities($_POST['booking_date']);
	$date = date('Y-m-d', strtotime($booking_date));
	$tno;
	$dest;
	$source;
	$price;
	$arrival;

	if ($trains == 'Mohanagar'){
		$tno='703';
		$dest='Chittagong';
		$source='Dhaka';
		$price='300';
		$arrival = '08:00:00';

	}
	elseif ($trains == 'Udayan'){
		$tno='723';
		$dest='Chittagong';
		$source='Sylhet';
		$price='360';
		$arrival ='8:30:00';
	}
	elseif ($trains == 'Egarosindhur'){
		$tno='737';
		$dest='Kishoreganj';
		$source='Dhaka';
		$price='100';
		$arrival = '09:30:00';
	}
	elseif ($trains == 'Silkcity'){
		$tno='753';
		$dest='Dhaka';
		$source='Rajshahi';
		$price='150';
		$arrival = '15:25:00';
	}
	elseif ($trains == 'Chitra'){
		$tno='763';
		$dest='Khulna';
		$source='Dhaka';
		$price='210';
		$arrival ='14:00:00';
	}

	$sql = "INSERT INTO booking (p_fname, p_lname, p_contact, t_no, t_destination,t_source,pricing,booking_date)
	VALUES ('$fname', '$lname', '$num', '$tno', '$dest', '$source', '$price', '$date')";

	$message='Please dont forget to note down your train number: '.$tno.' and arrives at:  '.$arrival.' .Dont forget to pay:  '.$price.' at the counter. Please take a Sceenshot of this message for future References';



if ($conn->query($sql) === TRUE) {

	echo "<script type='text/javascript'>alert('$message');</script>";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;

}
}
else{
	echo '<script>alert("Please fill up all the records first")</script>';
}

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book a ticket</title>
	<LINK REL="STYLESHEET" HREF="style.CSS">
	<style type="text/css">
		.msg {
			border:1px solid #bbb;
			padding:5px;
			margin:10px 0px;
			background:#eee;
		}
		#booktkt	{
			margin:auto;
			margin-top: 50px;
			width: 40%;
			height: 60%;
			padding: auto;
			padding-top: 50px;
			padding-left: 50px;
			background-color: rgba(247 255 247);
			border-radius: 25px;
		}
		html {
		  background: url(images/Train4.jpg) no-repeat center center fixed;
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#journeytext	{
			color: black;
			font-size: 28px;
			font-family:"Roboto", bold, sans-serif;
		}
		#trains	{
			margin-left: 90px;
			font-size: 18px;
		}
		#submit	{
			margin-left: 150px;
			margin-bottom: 40px;
			margin-top: 30px
		}
		.txt{
			width:90%;
			height: 1%;
			border: 1px solid brown;
			border-radius: 05px;
			padding: 20px 15px 20px 15px;
			margin: 10px 0px 15px 0px;
		}
		select{
			width:90%;
			border: 1px solid brown;
			border-radius: 05px;
			box-shadow: 1px 1px 2px 1px grey;
			padding: 10px 15px 10px 15px
		}
	</style>
	<script type="text/javascript">
		function validate()	{
			var trains=document.getElementById("trains");
			if(trains.selectedIndex==0)
			{
				alert("Please select your train");
				trains.focus();
				return false;
			}
		}
	</script>
</head>
<body>
	<?php
		include ('header.php');
	?>
	<div id="booktkt">
	<h1 align="center" id="journeytext">Choose your journey</h1><br/><br/>
	<form method="post" name="journeyform" onsubmit="return validate()">
		<label for="fname">First name:</label>
  	<input type="text" class ="txt" id="fname" name="fname"><br><br>
  	<label for="lname">Last name:</label>
		<input type="text" class ="txt" id="fname" name="lname"><br><br>
  	<label for="lname">Contact Number:</label>
  	<input type="text" class ="txt" id="lname" name="num"><br><br>
		<label for="lname">Trains available:</label><br>
		<select name="trains" class ="select">
			<option  value = ''>Select one...</option>
			<option value="Mohanagar" >Dhaka Express to Chittagong</option>
			<option value="Udayan" >Sylhet AC superfast to Chittagong</option>
			<option value="Egarosindhur">Dhaka Express to Kishoreganj</option>
			<option value="Silkcity" >Rajshahi Superfast to Dhaka</option>
			<option value="Chitra" >Dhaka Express to Khulna</option>
		</select>
		<br/><br/>
		<label for="start">Start date:</label><br><br>
		<input type="date" id="start" name="booking_date" value="2023-05-23"
       min="2010-01-01" max="2030-12-31">

		<br><br>
		<center><input type="submit" name="submit" id="submit" class="button" /></center>
	</form>
	</div>
	</body>
	</html>
