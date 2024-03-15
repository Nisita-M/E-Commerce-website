<?php

include "authguard.php";
include "../shared/connection.php";

$pid=$_GET['pid'];
$status=mysqli_query($connection, "insert into cart (userid, pid) values ($_SESSION[userid],$pid)");

if ($status){
    header ("location:home.php");
}
else{
    echo mysqli_error($connection);
}

?>
