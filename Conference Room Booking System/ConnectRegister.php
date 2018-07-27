<?php
	$con = mysqli_connect('localhost','root','');
	if(!$con){
		echo 'Not Connected To Server';
	}
	if(!mysqli_select_db($con,'booktable')){
		echo 'Database not selected';
	}
	$phn=$_POST['phn'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];	
	$mail = $_POST['mail'];
	$pwd = $_POST['pwd'];
	$check = mysqli_query($con,"select * from user where pwd='$pwd' and username='$username' ");
	$checkrows=mysqli_num_rows($check);
	if($checkrows>0){
	echo "<script type='text/javascript'>alert('Already Registered!')</script>";
	header("refresh:0.001; url=index.html");
	}
	else{
	$sql = "INSERT INTO user (phn,firstname,lastname,username,mail,pwd) VALUES ('$phn','$firstname','$lastname','$username','$mail','$pwd')";
	if(!mysqli_query($con,$sql)){
		echo "<script type='text/javascript'>alert('Connection to database unsuccessful!')</script>";
	}
	else{
		echo "<script type='text/javascript'>alert('Successful Registration!')</script>";
	header("refresh:0.001; url=login.html");
	}
}
?>