<html>
<head>
<title>Deactivate account</title>
<link rel="stylesheet" href="css/main.css">
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
<form id="login-form" class="login-form" name="form1" method="post" action="deact.php">
	        <div id="form-content">
	            <div class="welcome">
					Do you sure you wish to deactivate your account?
					<br />
					Email ID: <input type="text" name="email"><br/>
					Password: <input type="password" name="password"><br/><br/><br/>
					<center><input type="submit" name="submit" value="Deactivate account"></center>
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
if (isset($_POST['submit'])){
$email=$_POST['email'];
$password=$_POST['password'];

$sql = "SELECT email, password FROM login_cred where email='$email'";
$result = mysqli_query($conn, $sql);


if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_assoc($result))
{
$dbemail = $row['email'];
$dbpassword = $row['password'];
}
if($dbemail==$email&&$password==$dbpassword)
{
		$sql = "DELETE FROM login_cred WHERE email='$dbemail'";
if(mysqli_query($conn, $sql)){
    //echo "<script type='text/javascript'>alert('Successfully Deleted  account');</script>";
		//header("refresh:10; Location: logout.php");

		echo "<script type='text/javascript'>alert('Successfully Deleted  account');</script>";
		echo "<script>setTimeout(\"location = 'logout.php';\",1500);</script>";

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
