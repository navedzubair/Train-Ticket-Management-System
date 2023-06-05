<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="s1.css" type="text/css">
<style type="text/css">
	li {
		font-family: sans-serif;
		font-size:18px;
		
	}

	/* Links inside the dropdown */
	.dropdown-content a {
	  color: white;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	}

	/* Change color of dropdown links on hover */
	.dropdown-content a:hover {background-color: #ddd;}



	/* Change the background color of the dropdown button when the dropdown content is shown */
	.dropdown:hover .dropbtn {background-color: #3e8e41;}
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
</head>
<body link="white" alink="white" vlink="white">
     <div class="container light">
        <div class="wrapper">
          <div class="Menu">
					<img style="float: left;" alt="" src="images/logo.png" />
					<h2> Bangladesh <br> Railway</h2>
            <ul id="navmenu">

            <li><A HREF="index.php">Home</A></li>
            <li><A HREF="status.php">Train Info</A></li>
            <li><a href="booktkt.php">Book a ticket</a></li>
            <li><?php
				if(isset($_SESSION['user_info'])){
					echo '<div class="dropdown"><button onclick="myFunction()" class="dropbtn">'.$_SESSION['user_info'].'<div id="myDropdown" class="dropdown-content">
    <a href="changepw.php">Change password</a>
    <a href="deact.php">Deactivate account</a>
	  </div>
		</div>';
        }
				else
					echo '<A HREF="register.php">Login/Register</A>';
				?></li>
						<li><a href="logout.php">LogOut</a></li>
            </ul>

          </div>
        </div>
      </div>
			</div>
</body>
</html>
