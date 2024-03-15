<?php

$address = $_POST['address'];
$total = $_POST['total'];

include "authguard.php";
include "../shared/connnection.php";

$sql_status = mysqli_query($connection, "insert into orders(username, userid,address, total_amount) values ('$_SESSION[username]', $_SESSION[userid], '$address', $total)")


$orderid = $connection->insert_id;

$sql_result = mysqli_query($connection , "select * from cart join product on cart.pid = product.pid where userid = $_SESSION[userid]");

while($dbrow = mysqli_fetch_assoc($sql_result)){

    $insert_status = mysqli_query($connection, "insert into order_details(orderid, pid, name, price,detail, impath, owner) values ($orderid, $dbrow[pid],'$dbrow[name]',$dbrow[price],'$dbrow[detail]','$dbrow[impath]',$dbrow[owner])")

    if (!$insert_status){
        echo mysqli_error($connection);
    }
}


//Create entry in Order table
//Get the inserted ID
//Loop the cart items into Order detail table with the oder ID

?>