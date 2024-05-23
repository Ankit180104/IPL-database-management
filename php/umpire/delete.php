<?php
if(isset($_GET["Umpire_ID"])){
    $Umpire_ID=$_GET["Umpire_ID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "IPL";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql="DELETE from Umpire WHERE Umpire_ID=$Umpire_ID";
    $connection->query($sql);
}

header("location: /umpire/index.php");
exit;
?>