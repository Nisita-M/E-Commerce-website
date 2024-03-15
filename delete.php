<?php

$pid= $_GET['pid'];

echo "Received Id=$pid";

$connection = new mysqli ("localhost","root","","acme_proj",3306);

include "../shared/connection.php";

$sql_result = mysqli_query($connection,"delete from product where pid=$pid");

if ($sql_result){
    header("location:view.php");
}

else{
    echo "Failed to Delete";
    echo mysqli_query($connection);
}

?>
