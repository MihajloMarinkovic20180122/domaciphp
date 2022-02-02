<?php

require "../dbBroker.php";
require "../model/automobil.php";

session_start();

if(isset($_POST['id']) && isset($_POST['naziv']) && 
isset($_POST['cena']) && isset($_POST['datum'])){

    $automobil = new Automobil($_POST['id'], $_POST['naziv'], $_POST['cena'], $_POST['datum'], $_SESSION['user_id']);

    $rezultat = Automobil::getAll($conn);

    while($red = $rezultat->fetch_array()):

        if($red["Automobil_ID"] != $_POST['id']){
            if(strtoupper($red["Naziv"]) == strtoupper($_POST['naziv'])){
                echo 'Automobil sa unetim nazivom vec postoji!';
                return;
            }
        }
    endwhile;
   
    $status = Automobil::update($automobil, $conn);

    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo 'Failed';
    }
} 

?>