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
   
  <!--This section is for creating a block for the form -->

<div id="content1">
<div id="signup" class="infoblock4">

   	<!--This section shows how the forms are created -->

          <?php
         // define variables and set to empty values
         $firstnErr = $lastnErr = $emailErr = $eventsErr = $attendeesErr = $underErr = $betweenErr = $youngErr = $adultErr = "";
         $firstn = $lastn = $address = $mobile = $email = $events = $attendees = $under = $between = $young = $adult = $news = $list = "";
         
		 function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
		 //I have assumed that all the required section in this form is correct, so if there is something wrong with the fields in the form an error message will be created.
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
			 
			 $valid = true;
		
	//This part of the php code address the required fields of the form.
		
		//This section is a required field it address the first name of the user.
            if (empty($_POST["firstn"])) {
				$valid = false;
				// If the user has not filled this field then an error message will be generated to tell the user to fill it up.
               $firstnErr = "First name is required"; 
            }else {
               $firstn = test_input($_POST["firstn"]);
			   $_SESSION['firstn']=$firstn;
            }
            
			//This section is a required field it address the last name of the user.
			if (empty($_POST["lastn"])) {
				$valid = false;
				// If the user has not filled this field then an error message will be generated to tell the user to fill it up.
               $lastnErr = "Last name is required";
            }else {
               $lastn = test_input($_POST["lastn"]);
			   $_SESSION['lastn']=$lastn;
            }
			
			//This section is a required field it address the e-mail of the user.
			if (empty($_POST["email"])) {
				$valid = false;
				// If the user has not filled this field then an error message will be generated to tell the user to fill it up.
               $emailErr = "E-mail is required";
            }else {
               $email = test_input($_POST["email"]);
			   $_SESSION['email']=$email;
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
			   
            }
			//This section is a required field the user needs to select the even that they want to attend.
			if ($_POST["events"]== 'event1') { // This section is to make sure that the user doesn't choose the nonevent option.
				$valid = false;
				// If the user has not select an option in this field then an error message will be generated to tell the user select an event.
               $eventsErr = "Select an event";
            }else {
               $events = $_POST["events"];	
			   $_SESSION['events']=$events;
            }
			
		   //This section is a required field it ask to enter the number of people in the age group "under 5 years old".
		   //Predefined the field as 0. So if the person whose filling up the form doesnt have anyone whose under 5 years old they can leave this blank.
			if ($_POST["under"] == null) {
				$_SESSION['under']= 0;
			}else {
				if(is_numeric($_POST["under"])){
					$under = test_input($_POST["under"]);
			$_SESSION['under']=$under;
				}
				else{
					$valid = false;
					$underErr = "Please enter numeric value"; // Only numersic values are entered.
				}
				
			}
			
			//This section is a required field it ask to enter the number of people in the age group "between 5 and 12 years old".
		   //Predefined the field as 0. So if the person whose filling up the form doesnt have anyone whose between 5 and 12 years old they can leave this blank.
			if ($_POST["between"] == null) {
				$_SESSION['between']= 0;
			}else {
				if(is_numeric($_POST["between"])){
					$between = test_input($_POST["between"]);
			$_SESSION['between']=$between;
				}
				else{
					$valid = false;
					$betweenErr = "Please enter numeric value"; // Only numersic values are entered.
				}
				
				
			}
			
			
			//This section is a required field it ask to enter the number of people in the age group "between 13 and 17 years old".
		   //Predefined the field as 0. So if the person whose filling up the form doesnt have anyone whose between 13 and 17 years old they can leave this blank.
			if ($_POST["young"] == null) {
				$_SESSION['young']= 0;
			}else {
				if(is_numeric($_POST["young"])){
					$young = test_input($_POST["young"]);
			$_SESSION['young']=$young;
				}
				else{
					$valid = false;
					$youngErr = "Please enter numeric value"; // Only numersic values are entered.
				}
			}
			
			
			//This section is a required field it ask to enter the number of people in the age group "18 years old and above".
		   //Predefined the field as 0. So if the person whose filling up the form doesnt have anyone whose 18 years old and above they can leave this blank.
			if ($_POST["adult"] == null) {
				$_SESSION['adult']= 0;
			}else {
				if(is_numeric($_POST["adult"])){
					$adult = test_input($_POST["adult"]);
			$_SESSION['adult']=$adult;
				}
				else{
					$valid = false;
					$adultErr = "Please enter numeric value"; // Only numersic values are entered.
				}
				
			}
			 
          //If the user has not inputted any numbers in any of the field then an error message will show up and tell them to fill at least one of the subcategory field.
			 if($_POST["adult"] == null && $_POST["young"] == null && $_POST["between"] == null && $_POST["under"] == null){
				 $adultErr = "Please fill at least one Attendees field";
				  $youngErr = "Please fill at least one Attendees field";
				   $betweenErr = "Please fill at least one Attendees field";
				    $underErr = "Please fill at least one Attendees field";
				 $valid = false;
			 }
			 
			 //This section calculates the total number of people attending the event.
			if ($_POST["attendees"] == $under + $between + $young + $adult) {
				
				$attendees = test_input($_POST["attendees"]);
			$_SESSION['attendees']=$attendees;
			}
			else {
			$attendeesErr = "Please check your calculation"; // If the user has entered the the total number of people attending wrong an error message will show up.
			$valid = false;	
			}
			
			
		// This section address the optional requirement.
		
		//This part address the location of the user.
               $address = test_input($_POST["address"]);
			   $_SESSION['address']=$address;
      
			//This part address the phone number of the user.
               $mobile = test_input($_POST["mobile"]);
			   $_SESSION['mobile']=$mobile;
           
            
           //This part address the additional suggestions for events.
               $list = test_input($_POST["list"]);
			   $_SESSION['list']=$list;
         
            //This part address the newsletter field.
            if (empty($_POST["news"])) {
				$_SESSION['news']="";
				
			}else {
               $news = test_input($_POST["news"]);
			   $_SESSION['news']=$news;
            }
            
			
        //This links it to the confirmation page
		 
		if($valid){
			header("location:Confirmation.php");
			exit();
	}
			}
		 
		
      ?>
		<!--Title of the form -->
      <h2>Sign up for upcoming events</h2>
	  
      <!--Requied field message on the form so the users doent forget to fill up the required fields -->
      <p><span class = "error_message">* Please fill up the required field.</span></p> 
      
      <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         
		 <!-- Field created for the first name -->
		 <label for="firstn">First name: </label><br>
               <input type = "text" id="firstn" name = "firstn" placeholder = "Please enter your first name." size="42" value="<?php echo $firstn;?>"><br>
                  <span class = "error_message">* <?php echo $firstnErr;?></span>
				  <br><br>
               
			   <!-- Field created for the last name -->
			   <label for="lastn">Last name: </label><br>
               <input type = "text" id="lastn" name = "lastn" placeholder = "Please enter your last name." size="42" value="<?php echo $lastn;?>"><br>
                  <span class = "error_message">* <?php echo $lastnErr;?></span>
                <br><br>
				
				<!-- Field created for the user address -->
			   <label for="address">Address: </label><br>
               <input type = "text" id="address" name = "address" placeholder = "Please enter your address." size="42" value="<?php echo $address;?>">
				 <br><br>
               
			   <!-- Field created for the user phone number -->
			   <label for="mobile">Phone number: </label><br>
               <input type = "text" id="mobile" name = "mobile" placeholder = "Please enter your number." size="42" value="<?php echo $mobile;?>">
				  <br><br>
				  
               <!-- Field created for the user e-mail -->
			   <label for="email">E-mail: </label><br>
               <input type = "text" id="email" name = "email" placeholder = "Please enter your email" size="42" value="<?php echo $email;?>"><br>
                  <span class = "error_message">* <?php echo $emailErr;?></span>
				  <br><br>
				  
			    <!-- Drop down list created for the user to choos which even they want to attend -->
				<label for="events">Event: </label><br>
                  <select name = "events" id="events" value="<?php echo $events;?>">
				     <option value = "event1">Please select an event</option>
                     <option value = "Citizen Science">Citizen Science</option>
                     <option value = "Shot Hole Borer Citizen Science Project">Shot Hole Borer Citizen Science Project </option>
                     <option value = "Training and trap deployment">Training and trap deployment</option>
                     <option value = "Mid-point tap check">Mid-point tap check</option>
                     <option value = "Collect traps">Collect traps</option>
                  </select><br>
					<span class = "error_message">* <?php echo $eventsErr;?></span>
					<br><br>
					
				<!-- Section is for the sub-category of the different age groups -->
				<h3>Attendees:</h3>
					
				<p><span class = "error_message">* Please fill up atleast 1 sub-category.</span></p> 

				 <!--Requied field message on the form so the users doesn't forget to fill up the required fields -->
				<label for="under">Number of attendees under 5 years old: </label><br>
               <input onchange="findTotal()" type = "text" id="under" name = "under" placeholder = "Please enter under 5 years old" size="42" value="<?php echo $under;?>"><br>
                  <span class = "error_message">* <?php echo $underErr;?></span>
				  <br><br>
				  
				  <label for="between">Number of attendees between 5 and 12 years old: </label><br>
               <input onchange="findTotal()" type = "text" id="between" name = "between" placeholder = "Please enter between 5 and 12 years old" size="42" value="<?php echo $between;?>"><br>
                  <span class = "error_message">* <?php echo $betweenErr;?></span>
				  <br><br>
				  
				  <label for="young">Number of attendees 13 to 17 years old: </label><br>
               <input onchange="findTotal()" type = "text" id="young" name = "young" placeholder = "Please enter between 13 to 17 years old" size="42" value="<?php echo $young;?>"><br>
                  <span class = "error_message">* <?php echo $youngErr;?></span>
				  <br><br>
				  
				  <label for="adult">Number of attendees 18+ years old: </label><br>
               <input onchange="findTotal()" type = "text" id="adult" name = "adult" placeholder = "Please enter 18+ years old" size="42" value="<?php echo $adult;?>"><br>
                  <span class = "error_message">* <?php echo $adultErr;?></span>
				  <br><br>
				   
	<!--This function is used to ensure that the total is calculated automatically instead of typing it manually on the total attendees field -->
	<!-- After the user input a  number in one of the fields they need to click outside the field in order to get the total -->
	<!-- An error message is created if the user inputs a number which is not the total  -->

    <script>
 function findTotal()
 {
    var under = parseFloat(document.getElementById("under").value);
if (isNaN(under)) under  = 0;
   var between = parseFloat(document.getElementById("between").value);
if (isNaN(between)) between  = 0;
   var young = parseFloat(document.getElementById("young").value);
if (isNaN(young)) young  = 0;
 var adult = parseFloat(document.getElementById("adult").value);
if (isNaN(adult)) adult  = 0;
   var attendees  = (under + between + young + adult);
   document.getElementById("attendees").value = (attendees);

 }

 /* On submitting the webform, the function findTotal is executed */
 document.getElementById("attendees").onchange=findTotal;

</script>
	<!--Users to input the total number of people attending the event -->
				<label for="attendees">Total number of attendees: </label><br>
               <input type = "text" id="attendees" name = "attendees" size="42" value="<?php echo $attendees;?>"><br>
			   <span class = "error_message">* <?php echo $attendeesErr;?></span>
				  <br><br>

                <!-- Preslected checkbox for newsletter was created -->
				<label for="news">Sign up for newsletter: </label>
                  <input type = "checkbox" id="Yes" name = "news" value="Yes" checked>
				  <br><br>
				  
                <!-- Addition suggestion box was created -->
				<label for="list">List other events: </label><br>
                <textarea id="list" name = "list" rows = "4" cols = "30" value="<?php echo $list;?>"></textarea>
			   <br><br>
           
					<!-- Button for submit -->
					<button type="submit">Submit</button>
               
      </form>
      
   </div>
   
   <div id="picture" class="infoblock4">
   <img class="historymuseum" src="images/museum.jpg" alt="Inside of the museum">
   </div>
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