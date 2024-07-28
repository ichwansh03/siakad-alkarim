<?php

class DBCon{
    public function __construct()
    {
        global $conn;
        $server = "localhost";
        $dbname = "alkarim";
        $user = "root";
        $pw = "";
        $conn = mysqli_connect($server,$user,$pw,$dbname);

        if(!$conn){
            die("Database not connected ".$conn->connect_error());
        }
    }
}

?>

