<?php

session_start();

if (!isset($_SESSION['login_status'])){
    echo "Illegal attempt, Login bypassed";
    die;
}

if ($_SESSION['login_status']==false){
    echo "Unauthorized access, 403:Forbidden";
    die;
}

if($_SESSION['usertype']!='Vendor'){
    echo "Permisssion Denied, Authorization failed.";
    die;
}

echo "<div class='d-flex justify-content-evenly'>

<div>
    $_SESSION[userid]
</div>
<div>
    $_SESSION[username]
</div>
<div>
    <a href ='../shared/logout.php'>Logout</a>
</div>

</div>";

?>