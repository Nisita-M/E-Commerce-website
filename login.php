<?php

session_start();
$_SESSION['login_status']=false;

$uname = $_POST['uname'];
$upass=$_POST['upass'];

$connection = new mysqli("localhost","root","","acme_proj",3306);

$sql_result= mysqli_query($connection,  "select * from user where username = '$uname' and password='$upass'");

$no_of_rows = mysqli_num_rows($sql_result);

if ($no_of_rows==0){
    echo  "Invaid Credentials";
    die;
}

$dbrow=mysqli_fetch_assoc($sql_result);

echo "Login Success";
$_SESSION['login_status']=true;
$_SESSION['usertype']=$dbrow['usertype'];
$_SESSION['username']=$dbrow['username'];
$_SESSION['userid']=$dbrow['userid'];


if ($dbrow['usertype']=='Vendor'){
    header("location:../vendor/home.php");
}
else if($dbrow['usertype']=='Customer'){
    header("location:../customer/home.php");
}

?>