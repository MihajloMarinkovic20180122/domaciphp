<?php 

class User{
    public $id;
    public $name;
    public $lastName;
    public $dateOfBirth;
    public $username;
    public $password;

    public function __construct($id=null, $name=null, $lastName=null, $dateOfBirth=null, $password=null, $username = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->dateOfBirth = $dateOfBirth;
        $this->username = $username;
        $this->password = $password;
    }
    public static function logInUser($usr, mysqli $conn)
    {
        $query = "SELECT * FROM zaposleni WHERE Korisnicko_Ime='$usr->username' and Sifra='$usr->password'";
        return $conn->query($query);
    }

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM zaposleni";
        return $conn->query($query);
    }

    public static function add(User $korisnik, mysqli $conn)
    {
        $query = "INSERT INTO zaposleni(Radnik_ID,Ime,Prezime,Datum_Rodjenja,Sifra,Korisnicko_Ime) VALUES('$korisnik->id','$korisnik->name','$korisnik->lastName','$korisnik->dateOfBirth','$korisnik->password','$korisnik->username')";
        return $conn->query($query);
    }

    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM zaposleni WHERE Radnik_ID=$this->id";
        return $conn->query($query);
    }
    
    public static function getById($id, mysqli $conn){
        $query = "SELECT * FROM zaposleni WHERE Radnik_ID=$id";

        $myObj = array();
        if($mysqlObj = $conn->query($query)){
            while($red = $mysqlObj->fetch_array(1)){
                $myObj[]= $red;
            }
        }
        return $myObj;
    }
    public static function getNameById($id, mysqli $conn){
        $query = "SELECT Ime FROM zaposleni WHERE Radnik_ID=$id";
        return $conn->query($query);
    }

    public static function update(User $korisnik, mysqli $conn)
    {
        $query = "UPDATE zaposleni SET `Radnik_ID` = '$korisnik->id', `Ime` = '$korisnik->name', `Prezime` = '$korisnik->lastName', `Datum_Rodjenja` = '$korisnik->dateOfBirth', `Sifra` = '$korisnik->password', `Korisnicko_Ime` = '$korisnik->username' WHERE `zaposleni`.`Radnik_ID` = '$korisnik->id'";
        return $conn->query($query);
    }
}

?>