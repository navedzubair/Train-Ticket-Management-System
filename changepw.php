<html>
<head>
<title>Change password</title>
<link rel="stylesheet" href="css/main.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/main.js"></script>
<style type="text/css">
	a:link {color: #ffffff}
	a:visited {color: #ffffff}
	a:hover {color: #ffffff}
	a:active {color: #ffffff}
</style>
</head>
<body>
<?php
session_start();
include("header.php"); ?>
<form id="login-form" class="login-form" name="form1" method="post" action="changepw.php">
	        <div id="form-content">
	            <div class="welcome">
					Do you want to change your password?
					<br />
					Email ID: <input type="text" name="email"><br/>
					Current password: <input type="password" name="opw"><br/>
					New password: <input type="password" name="npw"><br/><br/>
					<center><input type="submit" name="changepw" value="Change password"></center>
				</div>
	        </div>
	    </form>
</body>
</html>
<?php
$conn = mysqli_connect("localhost","root","","railway");
if($conn-> connect_error){
	die("Connection Error". $conn-> connect_error);
}
if (isset($_POST['changepw'])){
$email=$_POST['email'];
$opw=$_POST['opw'];
$npw=$_POST['npw'];

$sql = "SELECT email, password FROM login_cred where email='$email'";
$result = mysqli_query($conn, $sql);


if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_assoc($result))
{
$dbemail = $row['email'];
$dbpassword = $row['password'];
}
if($dbemail==$email&&$opw==$dbpassword)
{
		$sql = "UPDATE login_cred SET password= '$npw' WHERE email='$email'";
if(mysqli_query($conn, $sql)){
    echo "<script type='text/javascript'>alert('Successfully updated password');</script>";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


}
else
echo "<script type='text/javascript'>alert('Incorrect password');</script>";
}
else
echo "<script type='text/javascript'>alert('User does not exist');</script>";
}
?>
