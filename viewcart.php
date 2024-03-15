<?php

include "authguard.php";
include "menu.html";

// $connection = new mysqli("localhost","root","","acme_proj",3306);
include "../shared/connection.php";

$sql_result = mysqli_query($connection , "select * from cart join product on cart.pid = product.pid where userid = $_SESSION[userid]");
$total=0;

echo "<div div class='card_cont'>";

while ($dbrow = mysqli_fetch_assoc($sql_result)){

    $total = $total+$dbrow["price"];

    echo "
            <div class='cont_card'>
                <div><h4>$dbrow[name]</h4></div>
                <div>₹$dbrow[price]</div>
                <div>$dbrow[detail]</div>
                <div class='pdtimg'>
                    <img src= '$dbrow[imgpath]'>
                </div>

                <div class='buttons'>
                    
                    </a>
                    <button onclick='deletecart($dbrow[cartid])'>Remove from Cart</button>
                </div>
            </div>";
}    

echo "</div>";

echo "<div class = 'm-4 p-2'>

    <form method ='post' action ='placeorder.php'class = 'w-50 mb-4'>
        <h3 class='mb-3'> Place Order </h3>
        <textarea class = 'form-control' name = 'address' placeholder = 'Enter Delivery Address'></textarea>
        <input value = '$total' hidden name = 'total'>
        <button class ='mt-4 p-3 btn btn-primary'>Place Order : Rs $total</button> 
    </form>

</div>";

?>

<html>
    <head>
        <style>
            .card_cont{
                background-color: rgba(187, 187, 187, 0.31);
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                padding: 20px;
            }
            .cont_card{
                width : 250px;
                display : inline-block;
                background-color: white;
                /* border: 0.1px solid grey; */
                border-radius: 2%;
                vertical-align:top;
                margin : 15px;
                padding : 20px;
                overflow: hidden;
            }

            .pdtimg img{
                
                display: block;
                margin : 0 auto;
                margin-top: 20px;
                margin-bottom: 20px;
                max-width :230px;
                max-height: 180px;    
            }

            .vendor{
                margin: 15px;
                text-align:center;
            }
            .buttons{
                display:flex;
                justify-content: space-evenly;
            }
            .buttons button{
                background-color: red;
                border: 1px solid red;
                border-radius:10px;
                margin top: 10px;
                width : 200px;
            }


        </style>
    </head>
    <body>
    </body>
    <script>
        function deletecart(cartid){
            res = confirm ("Do you want to Delete? ")
            if (res){
                window.location.href=`deletecart.php?cartid=${cartid}`;
            }
        }
    </script>
</html>

