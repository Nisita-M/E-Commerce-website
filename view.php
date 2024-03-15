<?php

include "authguard.php";
include "menu.html";

// $connection = new mysqli("localhost","root","","acme_proj",3306);
include "../shared/connection.php";

$sql_result = mysqli_query($connection , "select * from product where owner= $_SESSION[userid]");

echo "<div div class='card_cont'>";

while ($dbrow = mysqli_fetch_assoc($sql_result)){

    echo "
            <div class='cont_card'>
                <div><h4>$dbrow[name]</h4></div>
                <div>₹ $dbrow[price]</div>
                <div>$dbrow[detail]</div>
                <div class='pdtimg'>
                    <img src= '$dbrow[imgpath]'>
                </div>

                <div class='buttons'>
                    <a href='#'>
                    <button>Edit</button>
                    </a>
                    <button onclick = 'deletePdt($dbrow[pid])'>Delete</button>
                      
                </div>
                  
            </div>";
}    

echo "</div>";

?>

<html>
    <head>
        <style>
            .card_cont{
                
                background-color: rgba(224, 237, 170, 0.138);
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                padding: 20px;
            }
            .cont_card{
                width : 250px;
                display : inline-block;
                background-color: white;
                border: 1.5px solid grey;
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

            .buttons{
                display:flex;
                justify-content: space-evenly;
            }
            .buttons button{
                width : 90px;
            }


        </style>
    </head>
    <body>
    </body>
    <script>
        function deletePdt(pid){
            res = confirm ("Do you want to Delete? ")
            if (res){
                window.location.href=`delete.php?pid=${pid}`;
            }
        }
    </script>
</html>



