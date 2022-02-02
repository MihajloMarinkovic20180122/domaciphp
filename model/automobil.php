<?php

class Automobil{
    public $Automobil_ID;
    public $Naziv;
    public $Cena;
    public $DatumUnosa;
    public $Radnik_ID;

    public function __construct($Automobil_ID = null, $Naziv=null, $Cena= null, $DatumUnosa = null, $Radnik_ID = null)
    {
        $this->Automobil_ID = $Automobil_ID;
        $this->Naziv = $Naziv;
        $this->Cena = $Cena;
        $this->Radnik_ID = $Radnik_ID;
        $this->DatumUnosa = $DatumUnosa;     

    }
    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM automobili";
        return $conn->query($query);
    }

    
    public static function add(Automobil $automobil, mysqli $conn)
    {
        $query = "INSERT INTO automobili(Automobil_ID,Naziv,Cena,DatumUnosa,Radnik_ID) VALUES('$automobil->Automobil_ID','$automobil->Naziv','$automobil->Cena','$automobil->DatumUnosa','$automobil->Radnik_ID')";
        return $conn->query($query);
    }

    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM automobili WHERE Automobil_ID=$this->Automobil_ID";
        return $conn->query($query);
    }

    public static function getByName($name, mysqli $conn){
        $query = "SELECT * FROM automobili WHERE Naziv=$name";

        $myObj = array();
        if($mysqlObj = $conn->query($query)){
            while($red = $mysqlObj->fetch_array(1)){
                $myObj[]= $red;
            }
        }
        return $myObj;
    }

    public static function getById($id, mysqli $conn){
        $query = "SELECT * FROM automobili WHERE Automobil_ID=$id";

        $myObj = array();
        if($mysqlObj = $conn->query($query)){
            while($red = $mysqlObj->fetch_array(1)){
                $myObj[]= $red;
            }
        }
        return $myObj;
    }
    public static function update(Automobil $automobil, mysqli $conn)
    {
        $query = "UPDATE automobili SET `Automobil_ID` = '$automobil->Automobil_ID', `Naziv` = '$automobil->Naziv', `Cena` = '$automobil->Cena', `DatumUnosa` = '$automobil->DatumUnosa', `Radnik_ID` = '$automobil->Radnik_ID' WHERE `automobili`.`Automobil_ID` = '$automobil->Automobil_ID'";
        return $conn->query($query);
    }
}

?>