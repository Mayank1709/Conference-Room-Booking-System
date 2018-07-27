<?php
	$con = mysqli_connect('localhost','root','');
	if(!$con){
		echo 'Not Connected To Server';
	}
	if(!mysqli_select_db($con,'booktable')){
		echo 'Database not selected';
	}
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phn = $_POST['phn'];
	$mail = $_POST['mail'];
	$dateofbooking = $_POST['dateofbooking'];
	$roomtype = $_POST['roomtype'];
	$startingtime = $_POST['startingtime'];
	$endingtime = $_POST['endingtime'];

	$check = mysqli_query($con,"select startingtime from room where dateofbooking = '$dateofbooking' and roomtype='$roomtype' ");
	$storearray = Array();
	while($row = mysqli_fetch_array($check, MYSQL_ASSOC)){
		$storearray[]=$row['startingtime'];
	}
	//print_r($storearray);
	$check1 = mysqli_query($con,"select endingtime from room where dateofbooking = '$dateofbooking' and roomtype='$roomtype' ");
	$storearray1 = Array();
	while($row1 = mysqli_fetch_array($check1, MYSQL_ASSOC)){
		$storearray1[]=$row1['endingtime'];
	}
	echo nl2br("\n");
	//print_r($storearray1);
	//echo nl2br("\n");
	$len = count($storearray1);
	//echo $len;
	$i = 0;
	$flag =0 ;
	while($len >0){
		if ((($startingtime >= $storearray[$i]) && ($startingtime <= $storearray1[$i])) || (($endingtime >= $storearray[$i]) && ($endingtime <= $storearray1[$i]))){
			$flag=1;
			break;
		}
		else{
			$i++;
			$len--;
			continue;
		}
	}
	if ($flag == 0){
		//echo 'Available';
		$sql = "INSERT INTO room (firstname,lastname,phn,mail,dateofbooking,roomtype,startingtime,endingtime) VALUES ('$firstname','$lastname','$phn','$mail','$dateofbooking','$roomtype','$startingtime','$endingtime')";
		if(!mysqli_query($con,$sql)){
			echo 'Not Inserted';
		}
		else{
			echo "<script type = 'text/javascript'>alert('Selected Slot Available and Booked !!! ')</script>";
			//echo 'Inserted';
			//echo "<script type = 'text/javascript'>alert('Slot Booked !!! ')</script>";
			header("refresh:0.001;url = userhomepage.php");
		}
	}
	else{
		echo "<script type = 'text/javascript'>alert('Selected Slot NOT Available.. Booking Failed. Try Another Slot. ')</script>";
		//echo 'Not Available';
		header("refresh:0.001;url = book.php");
	}

?>