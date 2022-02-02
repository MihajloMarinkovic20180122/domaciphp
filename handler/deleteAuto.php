<?php

require "../dbBroker.php";
require "../model/automobil.php";

if(isset($_POST['Automobil_ID'])){
    $automobil = new Automobil($_POST['Automobil_ID']);
    $status = $automobil->deleteById($conn);
    if ($status){
        echo "Success";
    }else{
        echo "Failed";
    }
}

?>