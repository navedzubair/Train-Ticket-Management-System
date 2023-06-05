<?php

// Create connection
$conn = mysqli_connect("localhost","root","","railway");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit']))
{
  echo'code 1';
	if(!empty($_POST['name'])&& !empty($_POST['email'])&& !empty($_POST['message'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$message=$_POST['message'];

  $sql = "INSERT INTO feedback (name, email, message)
  VALUES ('$name', '$email', '$message')";

}
if ($conn->query($sql) === TRUE) {
  echo '<script>alert("Thank you for the feedback")</script>';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}
else{
	//echo '<script>alert("Please fill up all the records first")</script>';
}

?>


<!DOCTYPE html>
<html lang="en">
<title>Bangladesh Railway</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">

<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
div.a {
  text-align: center;
}
html {
  background: url(images/bg4.jpg) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
<script src="jquery.js"></script>
        <script>
            $(document).ready(function(){
              $("#Logout").hide();
            };
            $(document).ready(function(){
                $("#user").hover(function(){
                    $("#Logout").toggle("slow");
                });
            });
        </script>
<body>

<!-- Navbar -->
  <div class="w3-top">
   <div class="w3-bar w3-white w3-card">

<?php
session_start();
include("header.php"); ?>
    </div>
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- Automatic Slideshow Images -->
  <style>
  .mySlides {
    position: relative;
  }
  
  .mySlides img {
    max-width: 100%;
    height: auto;
  }
  
  .mySlides .text-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
    padding: 32px;
  }
  
  .mySlides .text-overlay h3 {
    font-size: 34px;
    font-weight: bold;
  }
  
  .mySlides .text-overlay p {
    font-size: 28px;
    font-weight: bold;
  }
</style>

<div class="mySlides">
  <img src="images/Train2.jpg">
  <div class="text-overlay">
    <h3>Welcome to Bangladesh Railway Site</h3>
    <p><b>We hope you have a pleasant journey on our trains, and we wish you all the best in your travels. </b></p>
  </div>
</div>

<div class="mySlides">
  <img src="images/Train1.jpg">
  <div class="text-overlay">
    <h3>Welcome to Komlapur Train Station</h3>
    <p><b>Welcome to Dhaka's National Train Station. This is the heart of Dhaka's Train Routes and the capital's Train station. </b></p>
  </div>
</div>

<div class="mySlides">
  <img src="images/Train3.jpg">
  <div class="text-overlay">
    <h3>The New Age</h3>
    <p><b>The Bangladesh Railway Association is proud to announce the new line of trains coming into Dhaka. </b></p>
  </div>
</div>



  <!-- The Tour Section -->
  <div class="w3-white" id="tour">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
      <h2 class="w3-wide w3-center">Tickets Available</h2>
      <p class="w3-opacity w3-center"><i>Tickets for June 2023</i></p><br>



      <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
      
        <div class="w3-third w3-margin-bottom">
        <a href="status.php">
          <img src="images/Chittagong.jpg" alt="Chittagong" style="width:100%" class="w3-hover-opacity" >
          </a>
          
          <div class="w3-container w3-white">
            <p><b>Chittagong</b></p>
            <p class="w3-opacity">Fri 15 Jan 2021</p>
            <p>Departure Time: 1330hrs.</p>

          </div>
        </div>
        <div class="w3-third w3-margin-bottom">
        <a href="status.php">
          <img src="images/Rajshahi.jpg" alt="Rajshahi" style="width:100%" class="w3-hover-opacity">
          </a>
          
          <div class="w3-container w3-white">
            <p><b>Rajshahi</b></p>
            <p class="w3-opacity">Sat 16 Jan 2021</p>
            <p>Departure Time: 930hrs.</p>

          </div>
        </div>
        <div class="w3-third w3-margin-bottom">
        <a href="status.php">
          <img src="images/Kishoreganj.jpg" alt="Kishoreganj" style="width:100%" class="w3-hover-opacity">
           </a>
           
          <div class="w3-container w3-white">
            <p><b>Kishoreganj</b></p>
            <p class="w3-opacity">Sun 17 Jan 2021</p>
            <p>Departure Time: 800hrs.</p>

          </div>
        </div>
      </div>
    </div>
  </div>




<!-- End Page Content -->
</div>


<!-- The Contact Section -->
  
<div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
    <h2 class="w3-wide w3-center">CONTACT</h2>
    <p class="w3-opacity w3-center"><i>Got any questions!</i></p>
    <div class="w3-row w3-padding-32">
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i> Dhaka, Bangladesh <br>
        <i class="fa fa-phone" style="width:30px"></i> Phone: +8001795422429<br>
        <i class="fa fa-envelope" style="width:30px"> </i> Email: info@bangladeshrailway.com<br>
      </div>
      <div class="w3-col m6">
        <form method="post" name="journeyform" onsubmit="return validate()">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Name" required name="name">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Email" required name="email">
            </div>
          </div>
          <input class="w3-input w3-border" type="text" placeholder="Message" required name="message"><br><br>
          <center><input type="submit" name="submit" id="submit" class="button" /></center>
        </form>
      </div>
    </div>
  </div>
  
  
  


<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <p class="w3-medium"></a></p>
</footer>

<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 4000);
}



</script>

</body>
</html>
