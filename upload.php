<?php

session_start();
print_r($_POST);

echo "<br>";

print_r($_FILES['pdtimg']);

$source =$_FILES['pdtimg']['tmp_name'];
$dest="../shared/images/".$_FILES['pdtimg']['name'];

echo "<br>";
echo $dest;

move_uploaded_file($source,$dest);

// $connection = new mysqli ("localhost","root","","acme_proj",3306);
include "../shared/connection.php";

echo  "insert into product(name, price, detail, imgpath, owner) values('$_POST[name]', $_POST[price],'$_POST[detail]','$dest', $_SESSION[userid])";

$status=mysqli_query($connection, "insert into product(name, price, detail, imgpath, owner) values('$_POST[name]', $_POST[price],'$_POST[detail]','$dest', $_SESSION[userid])");

if ($status){
    echo "Product Uploaded Successfully";
}
else{
    echo mysqli_error($connection);
}
?>