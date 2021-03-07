<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!--
Magiya, Priya
Red Id: 821438547
Instructor: Cyndi Chie
CS545_00
Assignment #4
Fall 2020
-->

<head>
<title>SDSU Natural History Museum</title>
<link rel="stylesheet" type="text/css" href="index.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8" />
</head>


<body>
		<!--The design  and the title of the header of the website -->

<header>
<div id="bg4">
<div class="top_header">
<h1>San Diego State University</h1>
<br>
<h1>Natural History Museum</h1>
</div>
</div>
</header>
		<!--This section shows the sidebar navigation -->

<div id="main">
<nav id="sidebar">
<ul id="nav1">
<li><a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Home</a></li>
<li><a href="About.php"><i class="fa fa-question-circle-o"></i> About Us</a></li>
<li><a href="Join.php"><i class="fa fa-handshake-o"></i> Join + Give</a></li>
<li><a href="Events.php"><i class="fa fa-calendar"></i> Events</a></li>
<li><a href="Science.php"><i class="fa fa-flask"></i> Science</a></li>
<li><a href="Learn.php"><i class="fa fa-book"></i> Learn + Explore</a></li>
</ul>
</nav>

<!--This section shows the content of the page -->
<div id="content">
<div id="events3" class="infoBlock2">
<h3>Events</h3>
<h4>Citizen Science<br>
Get Involved!</h4>
<br>
<img class="forest" src="images/forest.jpg" alt="Citizen Environment">
<p>
How can you have fun while simultaneously contributing to science? By joining the global citizen science movement. The Museum, independent naturalists, and outside organizations have created numerous citizen science projects aimed at helping scientists better understand the species that exists in any given region at any given time. Take part in the projects below to contribute to the exploration and creation of scientific knowledge. At The Museum, everyone is welcome to join in on the fun.
</p>
</div>
<div id="events1" class="infoBlock2">
<h4>Shot Hole Borer Citizen Science Project <br>
October - December, 2018</h4>
<br>
<img class="river" src="images/river.jpg" alt="River bank">
<p>Help combat invasive species! They may be small, but shot hole borer beetles are doing big damage in San Diego. These pests threaten our fragile river woodlands by infesting willows and sycamores, leaving dead, broken trunks in their wake.
<br>
<br>
To help combat the damage being done by this invasive species, the SDSU Natural History Museum (The Museum) and the San Diego River Park Foundation are teaming up to monitor the beetle’s presence in the San Diego River Watershed—and we need your help!
</p>
</div>
<div id="events2" class="infoBlock2">
<h4>How you can help</h4>
<p>We’re actively recruiting citizen scientists to help us set-up, check, and retrieve insect traps. Training will be provided—the only experience needed is comfort exploring the great outdoors, no formal background in science necessary. Three-day commitment required:
<br>
<br>
</p>
<ul>
<li>First Saturday October, 9 AM–2 PM: Training and trap deployment</li>
<li>First Saturday November: Mid-point tap check</li>
<li>First Saturday December: Collect traps, transport to The Museum, and analyze what you’ve found under a microscope</li>
</ul>
<button class="button" onclick="document.location='Form.php'">Sign Up</button>
</div>
</div>
</div>
<!-- This addititional attribute has been added because if the user have questions regarding the events or other things in the website they 
can send out a message right away and it also helps that the pop-up inquire button is in every page so they dont have to go to a specific page to ask question. -->

<?php

// define variables and set to empty values
$msg = $firstn = $lastn = $email = "";
$emailErr = "";

function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
		 //I have assumed that all the required section in this form is correct, so if there is something wrong with the fields in the form an error message will be created.
		 if ($_SERVER["REQUEST_METHOD"] == "POST") {
			 
			 $valid = true;
			 
			 $msg = test_input($_POST["msg"]);
			   $_SESSION['msg']=$msg;
			   
			   //This section is a required field it address the first name of the user.
			  $firstn = test_input($_POST["firstn"]);
			   $_SESSION['firstn']=$firstn;
			   
			   //This section is a required field it address the last name of the user.
			   $lastn = test_input($_POST["lastn"]);
			   $_SESSION['lastn']=$lastn;
			   
			   //This section is a required field it address the e-mail of the user.
			   $email = test_input($_POST["email"]);
			   $_SESSION['email']=$email;
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
			   
			   //This links it to the message page
			   if($valid){
			header("location:message.php");
			exit();
	}
			}
			
	      ?>
		
			   
<button class="opbtn" onclick="opform()">Inquire</button>

<div class="msgbtn" id="msgForm">

	<!-- Inquire pop-up form created for the user -->
  <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="fcontain">
	
	<!-- Field created for the first name -->
	<label for="firstn">First Name: </label><br>
               <input type = "text" id="firstn" name = "firstn" placeholder = "Enter" size="38" value="<?php echo $firstn;?>" required><br>
	<br>
	<!-- Field created for the last name -->
	<label for="lastn">Last Name: </label><br>
               <input type = "text" id="lastn" name = "lastn" placeholder = "Enter" size="38" value="<?php echo $lastn;?>" required><br>
	<br>
	<!-- Field created for the user e-mail -->
	<label for="email">E-mail: </label><br>
    <input type = "text" id="email" name = "email" placeholder = "Enter" size="38" value="<?php echo $email;?>" required><br>
    <span class = "error_message"> <?php echo $emailErr;?></span>
<br>
	<!-- Field created for the user to input their question -->
    <label for="msg">Inquire: </label>
    <textarea placeholder="Type your question.." name="msg" value="<?php echo $msg;?>" required></textarea>

    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="clform()">Close</button>
  </form>
</div>

<!-- This function is for the pop-up -->
<script>
function opform() {
  document.getElementById("msgForm").style.display = "block";
}

function clform() {
  document.getElementById("msgForm").style.display = "none";
}
</script>

   <!--Footer design of the page -->

<footer class="footer">
<div class="part1">
<img id="logo1" src="images/logo1.png" alt="SDSU logo">
</div>
<div class="part2">
<img id="logo2" src="images/logo2.png" alt="National History Museum of San Diego County logo">
<h2>The San Diego State University Natural History Museum is part of the National History Museum of San Diego County</h2>
<ul class="Nav2">
<li><a class="active" href="#"><i class="fa fa-asl-interpreting"></i> Join</a></li>
<li><a href="#"><i class="fa fa-money"></i> Donate</a></li>
<li><a href="#"><i class="fa fa-user-plus"></i> Volunteer</a></li>
</ul>
<p> This page was last updated: </p>
<!-- This function is used for the time to be automatically updated after the files are modified -->
<!-- This function also includes the format of the time differently just to be more specific and to show the user the time zone -->
<script>
m = new Date(document.lastModified);
d = new Date();
document.write(m+"<br>");
document.write(format_time(m)+"<p>");
</script> 
</div>
</footer>
</body>
</html>