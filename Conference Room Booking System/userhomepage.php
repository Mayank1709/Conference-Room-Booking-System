<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Page</title>
	<link rel="stylesheet" href="styleuserhomepage.css">
</head>
<div class = "styleecho">

<?php
session_start(); // Right at the top of your script

  if($_SESSION['logged']==true)
    { 
      echo 'Hello ';
      echo $_SESSION["abc"];
        }
  else if($_SESSION['logged']==false)
    {
      echo 'Not logged in. Error<a href="index.html">';
    }
  ?>
</div>

	
<body>
	<nav>
			<a href="availability.php">Check Availability</a>
			<a href="book.php">Book Room</a>
			<a href="mybookings.php">My Bookings</a>
			<a href="index.html">Logout</a>
	</nav>
<footer>
		<p>Email: 24hoursbooking@conference.com<br/><br/>
		Phone: 123456789<br/><br/>
		&copy; Mayank Swaraj. All Rights Reserved.</p>
	</footer>

</body>
</html>