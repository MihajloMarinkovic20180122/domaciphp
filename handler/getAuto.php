<?php

require "../dbBroker.php";
require "../model/automobil.php";

if(isset($_POST['id'])){
    $myArray = Automobil::getById($_POST['id'], $conn);
    echo json_encode($myArray);
}

?>