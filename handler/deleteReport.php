<?php

require "../dbBroker.php";
require "../model/report.php";

if(isset($_POST['id'])){
    $report = new Report($_POST['id']);
    $status = $report->deleteById($conn);
    if ($status){
        echo "Success";
    }else{
        echo "Failed";
    }
}

?>