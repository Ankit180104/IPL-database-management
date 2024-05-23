<?php
if(isset($_GET["Match_ID"])){
    $Match_ID=$_GET["Match_ID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "IPL";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql="DELETE from played WHERE Match_ID='$Match_ID' ";
    $connection->query($sql);
}

header("location: /played/index.php");
exit;
?>