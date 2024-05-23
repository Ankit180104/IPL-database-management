<?php
if(isset($_GET["PlayerID"])){
    $PlayerID=$_GET["PlayerID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "IPL";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql="DELETE from players WHERE PlayerID='$PlayerID' ";
    $connection->query($sql);
}

header("location: /player/index.php");
exit;
?>