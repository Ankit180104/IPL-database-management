<?php
if(isset($_GET["CompanyName"])){
    $CompanyName=$_GET["CompanyName"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "IPL";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql="DELETE from titlesponsor WHERE CompanyName='$CompanyName' ";
    $connection->query($sql);
}

header("location: /titlesponsor/index.php");
exit;
?>