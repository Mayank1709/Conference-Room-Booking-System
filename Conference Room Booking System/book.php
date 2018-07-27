<?php
// Start the session
session_start();
//echo $_SESSION["var1"];
//echo $_SESSION["var3"];
//echo $_SESSION["var4"];
//echo $_SESSION["var5"];
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Booking</title>
	<link rel="stylesheet" href="stylebook.css">
</head>	
<body>
<h1><span class="highlight"><b><i>Book Your Room Here</i></b></span></h1>
<form action="temp.php" method="post">
  <div class="transbox">
  &nbsp; <b>1. First name:</b>
  &nbsp; &nbsp; <input type="text" name="firstname" value="<?php echo $_SESSION["var1"];?>" required>
  <br/><br/>
  &nbsp; <b>2. Last name:</b>
  &nbsp; &nbsp; <input type="text" name="lastname" value="<?php echo $_SESSION["var3"];?>"required>
  <br/><br/>
  &nbsp; <b>3. Conact Details:</b><br/>
  	&emsp; &emsp; &emsp; <b>a. Phone Number:</b> &nbsp;<input type="numeric" name="phn" value="<?php echo $_SESSION["var4"];?>"required>
	&nbsp; &nbsp; <br/> &emsp; &emsp; &emsp; <b>b. Email:</b> &nbsp; &nbsp;&nbsp; &emsp; &emsp; <input type="email" name="mail" value="<?php echo $_SESSION["var5"];?>"required><br/><br/>
  &nbsp; <b>4. Booking Details:</b> <br/>
	&emsp; &emsp; &emsp; <b>a. Date of Booking:</b> 
&nbsp; <input required type="date" name="dateofbooking" id="dateofbooking" min="2017-07-02" /><br/>
  	&emsp; &emsp; &emsp; <b>b. Select Booking Slot:</b> <br>
  &emsp; &emsp; &emsp; &emsp; <b>Enter Starting Time:</b>&emsp;&emsp;&nbsp;<input required type="time" name="startingtime"> <br>
  &emsp; &emsp; &emsp;  &emsp; <b>Enter Ending Time:</b> &emsp; &emsp; <input required type="time" name="endingtime"><br>
<b>c. Select Room:</b><br>
  &emsp; &emsp; &emsp; <input type="radio" name="roomtype" value="Banquet" > <b>Banquet Style</b><br/>
  &emsp; &emsp; &emsp; <input type="radio" name="roomtype" value="Classroom"> <b>Classroom Style</b><br>
  &emsp; &emsp; &emsp; <input type="radio" name="roomtype" value="Theatre"> <b>Theatre Style</b><br>
  <br>&emsp; &emsp; &emsp; &nbsp&nbsp&nbsp<input type="submit" value="Submit"><br>
</form> 
</body>
</div>
<footer>
<p>&copy;Mayank Swaraj. All Rights Reserved.</p>
</footer>
</html>