<?php

$cartid = $_GET['cartid'];


$connection = new mysqli ("localhost","root","","acme_proj",3306);
include "../shared/connection.php";

$result = mysqli_query($connection,"delete from cart WHERE cartid = $cartid");

if ($result){
    header('location:http://localhost/acme-project/vendor/viewcart.php');
}
else{
    echo "Failed to Delete";
    echo mysqli_query($connection);
}

?>