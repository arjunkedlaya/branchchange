<?php
session_start();
if(isset($_POST['submit']))
{   
    include_once 'databaseconnect.php';
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $reg=mysqli_real_escape_string($conn,$_POST['reg']);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     	header("Location:../login.php?login=InvalidEmail");
     	exit();
    }
    $sql="SELECT * FROM access WHERE semail ='$email' AND sreg='$reg'";
    $result=mysqli_query($conn,$sql);
    $resultCheck=mysqli_num_rows($result);
    if($resultCheck>0){
        $sql="SELECT * FROM access WHERE semail ='$email' AND sreg='$reg'";
        $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck<1){
            header("Location: ../login.php?login=IncorrectCredentials1");
           exit();
        }
        else if($row=mysqli_fetch_assoc($result)){
            if($reg!=$row['sreg']){
                 header("Location:../login.php?login=IncorrectCredentials2");
                 alert("IncorrectCredentials");
                 exit();
        }
        else if($reg==$row['sreg']){
                $_SESSION['email']=$row['semail'];
                $sid=$row['s_id'];
                $_SESSION['s_id']=$row['s_id'];
                $sql="SELECT d_id FROM details WHERE s_id ='$sid'";
                $result=mysqli_query($conn,$sql);
                $resultCheck=mysqli_num_rows($result);
                if($resultCheck>0)
                {
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($result);
                    $_SESSION['d_id']=$row['d_id'];
                    header("Location:../blocked.php");
                    exit();
                }
                header("Location:../home.php?=login=success");
                exit();
            }
        }
    }
    else{
    		header("Location:../login.php?login=IncorrectCredentials3");
            alert("IncorrectCredentials");
	        exit();
        }
    	
    }
else
{
	header("Location:../login.php");
    alert("Error");
	exit();
}