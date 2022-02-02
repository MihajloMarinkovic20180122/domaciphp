<?php

require "../dbBroker.php";
require "../model/report.php";

session_start();

if(isset($_POST['txt-izvestaj'])){
    $today = date("Y-m-d");
    $tekst = $_POST['txt-izvestaj'];
    $report = new Report(null,$today, $tekst, $_SESSION['username']);
    
    if(trim(strlen($tekst))<1){
        echo "Ne možete poslati prazan izveštaj";
        return;
    }
    if(trim(strlen($tekst))<10){
        echo "Izveštaj je prekratak";
        return;
    }

    $status = Report::add($report, $conn);
    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo 'Failed';
    }
} 

?>