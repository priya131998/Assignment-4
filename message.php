<?php
session_start();
?>
<!DOCTYPE html>
<html lang='en'>
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
		<link rel="stylesheet" type="text/css" href="index2.css">
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
   
   
<!-- Inquire page -->
	<div class="infoBlock1">
	
	<h2>We will reach back to you as soon as possible!</h2><br>
	<h2>Thank you for your patience!</h2><br><br>
	
	<!-- This function is to ensure that first letter will always be capital in the confirmation page no matter how they formatted while inputting.-->
	<!-- I have also added an additional attribute which make sure that if there is a "-" or "'" in words it'll make sure the letter will be capitalized before and after the hyphen and apostrophe. e.g Sam-Conner or O'Brian. -->
	<script> 
	function caseLetter(str) {
		
	 str = str.replace(/\b[a-z]/g, function(letter) { return letter.toUpperCase(); });
    str = str.replace(/'(S)/g, function(letter) { return letter.toLowerCase(); });
	str = str.toLowerCase().replace(/\b(\w)/g, m => m.toUpperCase());
  return str;
}
	</script>
<span>First Name:
<script>document.write(caseLetter(<?php echo '"'.$_SESSION["firstn"].'"';?>));</script></span><br><br> <!--Outputs the response from the first name field.-->
<span>Last Name:
<script>document.write(caseLetter(<?php echo'"'.$_SESSION["lastn"].'"';?>));</script></span><br><br> <!--Outputs the response from the last name field.-->
	
	
<!-- Outputs the responses from the inquire form -->
<?php

echo 'E-mail: ', $_SESSION["email"]; //Outputs the response from the e-mail field.
echo "<br>" . "<br>";
echo 'Message: ', $_SESSION["msg"]; //Outputs the response from the inquire field.

?>

   </div>
   </div>
   
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