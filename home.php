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
		  <meta name="author" content="Arjun S Kedlaya">
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
    	 <h3>Rules for Applying for Branch Chnage</h1>
    	 <p>Here are the rules</p>
    	 <h3>Form for Applying Branch Change</h1>
		 <form action="serverside/homeserver.php" method="POST" class="form login">
		   <p align="center"><b>If you want to reset your preferences please refresh the page.</b></p>
		   Enter First Preference<div style="color:red;">(Required Field)</div>
           <label><input type="radio" name="first" value="CSE" required>CSE</label>
           <label><input type="radio" name="first" value="ECE">ECE</label>
           <label><input type="radio" name="first" value="ME">ME</label>
           <label><input type="radio" name="first" value="EIE">EIE</label>
           <label><input type="radio" name="first" value="EEE">EEE</label>
           <br><br>
           Enter Second Preference<div style="color:red;">(Required Field)</div>
           <label><input type="radio" name="second" value="CSE" required>CSE</label>
           <label><input type="radio" name="second" value="ECE">ECE</label>
           <label><input type="radio" name="second" value="ME">ME</label>
           <label><input type="radio" name="second" value="EIE">EIE</label>
           <label><input type="radio" name="second" value="EEE">EEE</label>
           <br><br>
           Enter Third Preference
           <label><input type="radio" name="third" value="CSE" >CSE</label>
           <label><input type="radio" name="third" value="ECE">ECE</label>
           <label><input type="radio" name="third" value="ME">ME</label>
           <label><input type="radio" name="third" value="EIE">EIE</label>
           <label><input type="radio" name="third" value="EEE">EEE</label>
           <br><br>
           <!-- <button onClick="reset3();">Reset Third Preference</button> -->
           Enter Fourth Preference
           <label><input type="radio" name="fourth" value="CSE" >CSE</label>
           <label><input type="radio" name="fourth" value="ECE">ECE</label>
           <label><input type="radio" name="fourth" value="ME">ME</label>
           <label><input type="radio" name="fourth" value="EIE">EIE</label>
           <label><input type="radio" name="fourth" value="EEE">EEE</label>
          <!--  <button onClick="reset4();">Reset Fourth Preference</button> -->
           <br><br>
           Enter Student Name<div style="color:red;">(Required Field)</div>
           <label><input type="text" name="sname" required><br><br>

           Enter Student Phone Number<div style="color:red;">(Required Field)</div>
           <label><input type="text" name="sphone" required></label><br><br>

           Enter Parent Name<div style="color:red;">(Required Field)</div>
           <label><input type="text" name="pname" required></label><br><br>

           Enter Parent Phone Number<div style="color:red;">(Required Field)</div>
           <label><input type="text" name="pphone" required></label><br><br>

        <input type="submit" name="submit" value="Submit">

    </form>
    <script type="text/javascript">
    	function reset3()
    	{
    		$('input[name=third]').attr('checked',false);
    	}
    	function reset4()
    	{
    	    $('input[name=fourth]').attr('checked',false);	
    	}
    </script>
    </body>
