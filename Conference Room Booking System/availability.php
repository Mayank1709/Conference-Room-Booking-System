<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Booking</title>
	<link rel="stylesheet" href="styleavailability.css">
</head>	
<body>
<h1><span class="highlight"><b><i>Check Availability</i></b></span></h1>
<form action="availability.php" method="post">
  <div class="transbox">
	&emsp; &emsp; &emsp; <b>Filter by date of booking:</b> 
&nbsp; <input required type="date" name="dateofbooking" id="dateofbooking" min="2017-07-02" /><br/>
  	
  <br>&emsp; &emsp; &emsp; &nbsp&nbsp&nbsp<input type="submit" value="Submit"><br>
</form> 
</body>
</div>
<?php
	$con = mysqli_connect('localhost','root','');
	if(!$con){
		echo 'Not Connected To Server';
	}
	if(!mysqli_select_db($con,'booktable')){
		echo 'Database not selected';
	}
	if(isset($_POST['dateofbooking'])){
	$dateofbooking = $_POST['dateofbooking'];
	$check = mysqli_query($con,"select * from room where dateofbooking = '$dateofbooking' ");
	}
	else{
	$check = mysqli_query($con,"select * from room ");
	}
?>

<table border="2">
  <thead>
    <tr>
         <th>Date of Booking</th>
      <th>Room Type</th>
      <th>Starting Time</th>
      <th>Ending Time</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if( mysqli_num_rows( $check )==0 ){
        echo '<tr><td colspan="8">All slots available</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $check ) ){
          echo "<tr><td>{$row['dateofbooking']}</td><td>{$row['roomtype']}</td><td>{$row['startingtime']}</td><td>{$row['endingtime']}</td><td>Booked</td></tr>\n";
        }
      }
      
    ?>
  </tbody>
</table>
<nav>
	<a href = "book.php">Book Room Now</a>
</nav>
</html>