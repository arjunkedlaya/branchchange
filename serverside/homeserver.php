<?php
session_start();
$email=$_SESSION['email'];
$sid=$_SESSION['s_id'];
if(isset($_POST['submit']))
{   
    include_once 'databaseconnect.php';
    $third=NULL;$fourth=NULL;
    $first=mysqli_real_escape_string($conn,$_POST['first']);
    $second=mysqli_real_escape_string($conn,$_POST['second']);
    if(isset($_POST['third'])){
     $third=mysqli_real_escape_string($conn,$_POST['third']);
    } 
    if(isset($_POST['fourth'])){
     $fourth=mysqli_real_escape_string($conn,$_POST['fourth']);
    } 
    $sname=mysqli_real_escape_string($conn,$_POST['sname']);
    $sphone=mysqli_real_escape_string($conn,$_POST['sphone']);
    $pname=mysqli_real_escape_string($conn,$_POST['pname']);
    $pphone=mysqli_real_escape_string($conn,$_POST['pphone']);
    $data=array($first,$second,$third,$fourth);
    $unique = array_unique($data);
    if($first== NULL||$second== NULL||$sname== NULL||$sphone== NULL||$pname== NULL||$pphone== NULL){
     	header("Location:../home.php?IncorrectDetails");
     	exit();
    }
    else if($first==$second||$first==$third||$first==$fourth||$second==$third||$second==$fourth)
    {
        echo "<script type='text/javascript'>alert('Same Stream cannot be taken twice for preference');window.location.href='../home.php'</script>";
    }
    else if($third!=NULL&&$fourth!=NULL&&$third==$fourth)
    {
         echo "<script type='text/javascript'>alert('Same Stream cannot be taken twice for preference');window.location.href='../home.php'</script>";
    }
    else{
    $sql="INSERT INTO details (sname,sphone,pname,pphone,first,second,third,fourth,s_id) VALUES ('$sname', '$sphone', '$pname', '$pphone','$first','$second','$third','$fourth','$sid');";
    mysqli_query($conn, $sql);
    $sql="SELECT d_id FROM details WHERE sname='$sname' AND s_id='$sid'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $message='Application Successful.Reference Number ='.$row['d_id'];
    echo "<script type='text/javascript'>alert('$message');window.location.href='../logout.php'</script>";
    }
}
else{
    header("Location: ../home.php?Error");
    exit();
}