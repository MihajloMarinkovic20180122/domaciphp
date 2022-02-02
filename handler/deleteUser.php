<?php

require "../dbBroker.php";
require "../model/user.php";
require "../model/automobil.php";

if(isset($_POST['Radnik_ID'])){

    $user = new User($_POST['Radnik_ID']);

    $status = $user->deleteById($conn);
    if ($status){
        echo "Success";
    }else{
        echo "Failed";
    }
}

?>