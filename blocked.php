<?php
 session_start();
if(!isset($_SESSION['email'])){
   header('location:login.php?sessionfailed');
}
include_once 'serverside/databaseconnect.php';
 $email=$_SESSION['email'];
 $sql="SELECT * from access WHERE semail='$email'";
 $result=mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) < 1) {
    header('location:logout.php?sessionfailed');
   exit();
}
?>
<!DOCTYPE html>
  <html lang="en" >
    <head>
		  <meta charset=utf-8 />
		  <meta name="viewport" content="width=device-width,height=device-height initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
		  <title>Branch Change - Home Page</title>
		  <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.orange-indigo.min.css">
		  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		  <link rel="stylesheet" href="css/homestyle.css">
		  <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"> -->
	      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    </head>
    <body>
    	<a href="logout.php" class="button">Logout</a>
    	<h3 class="text-center"><?php echo "Application Reference Number = " . $_SESSION["d_id"] . "<br>"; ?></h3>
    	<h6 class="text-center">Since you have successfully submitted the application once.You will not be allowed to submit again.</h6>
    </body>
    </html>