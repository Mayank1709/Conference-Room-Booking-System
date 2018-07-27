<?php
session_start(); // Right at the top of your script

  if($_SESSION['logged']==true)
    { 
      //echo 'Hello ';
      $abc= $_SESSION["var1"];
        }
  else if($_SESSION['logged']==false)
    {
      echo 'Not logged in. Error<a href="index.html">';
    }
  ?>
<?php
	$con = mysqli_connect('localhost','root','');
	if(!$con){
		echo 'Not Connected To Server';
	}
	if(!mysqli_select_db($con,'booktable')){
		echo 'Database not selected';
	}
	$check = mysqli_query($con,"select * from room where firstname = '$abc' ");
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Check Availability</title>
	<link rel="stylesheet" href="stylemybookings.css">
</head>
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
        echo '<tr><td colspan="8">No Rows Returned</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $check ) ){
          echo "<tr><td>{$row['dateofbooking']}</td><td>{$row['roomtype']}</td><td>{$row['startingtime']}</td><td>{$row['endingtime']}</td><td>Booked</td></tr>\n";
        }
      }
      
    ?>
  </tbody>
</table>
</html>