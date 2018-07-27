
<?php
session_start();
include('login.html');
$servername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="booktable";

$conn= new mysqli($servername, $dbusername, $dbpassword, $dbname);
$ID=$_POST['ID'];
$Password=$_POST['Password'];
$errors=array();
if(empty($ID) === TRUE || empty($Password) === TRUE)
{	$errors[]='Enter username and password';

}

$_SESSION['var']= $ID;

$sql = "SELECT phn FROM user WHERE username = '$ID' and pwd = '$Password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $sql1 = "SELECT firstname FROM user WHERE username = '$ID' and pwd = '$Password'";
      $result1 = mysqli_query($conn,$sql1);
      $row1 = mysqli_fetch_array($result1);
      $firstname = $row1['firstname'];
$_SESSION['var1']= $firstname;
 
 $sql2 = "SELECT lastname FROM user WHERE username = '$ID' and pwd = '$Password'";
      $result2 = mysqli_query($conn,$sql2);
      $row2 = mysqli_fetch_array($result2);
      $lastname = $row2['lastname'];
$_SESSION['var3']= $lastname;

 $sql3 = "SELECT phn FROM user WHERE username = '$ID' and pwd = '$Password'";
      $result3 = mysqli_query($conn,$sql3);
      $row3 = mysqli_fetch_array($result3);
      $phn = $row3['phn'];
$_SESSION['var4']= $phn;

 $sql4 = "SELECT mail FROM user WHERE username = '$ID' and pwd = '$Password'";
      $result4 = mysqli_query($conn,$sql4);
      $row4 = mysqli_fetch_array($result4);
      $mail = $row4['mail'];
$_SESSION['var5']= $mail;

     $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
$_SESSION['logged']=true;
   // $_SESSION['username']=$firstname;
$_SESSION['abc']=$firstname;
    header("Location: userhomepage.php");
    exit();
       //$_SESSION['logged']=true;
    //$_SESSION['ID']=$myusername;
    //header("Location: onlinestore.html");
       // header('Location:userhomepage.html');
	  
      }
	  else {
       //  $error = "Your Login Name or Password is invalid";
		 echo "<script type='text/javascript'>alert('Your Login Name or Password is invalid')</script>";
      }
   
?>
