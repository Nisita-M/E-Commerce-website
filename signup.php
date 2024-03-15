<?php

if (!isset($_POST['uname']) || !isset($_POST['upass1']) )

{
    echo "Missing Params";
    die;
}

$connection=new mysqli("localhost","root","","acme_proj",3306);

$status=mysqli_query($connection,"insert into user(username,password, usertype) values ('$_POST[uname]', '$_POST[upass1]' ,'$_POST[usertype]')");
 
if ($status){
    echo "Registration Successful!";
}
else{
    echo mysqli_query($connection);
}

?>