<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "IPL";


$connection = new mysqli($servername, $username, $password, $database);

$CompanyName="";
$BusinessDomain="";
$Country= "";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']== 'GET'){

    if(!isset($_GET["CompanyName"])){
        header("location: /titlesponsor/index.php");
        exit;
    }
    $CompanyName=$_GET["CompanyName"];


    $sql="SELECT * FROM titlesponsor WHERE CompanyName='$CompanyName' ";
    $result = $connection->query($sql);
    $row=$result->fetch_assoc();

    if(!$row){
        header("location: /titlesponsor/index.php");
        exit;
    }
    $CompanyName=$row["CompanyName"];
    $BusinessDomain=$row["BusinessDomain"];
    $Country=$row["Country"];
}
else{
    $CompanyName=$_POST["CompanyName"];
    $BusinessDomain=$_POST["BusinessDomain"];
    $Country=$_POST["Country"];

    do{
        if(empty($CompanyName) || empty($BusinessDomain) || empty($Country)){
            $errorMessage= "All the fields are required";
            break;
        }

        $sql = "UPDATE titlesponsor " .
               "SET BusinessDomain='$BusinessDomain',Country='$Country' " . 
               "WHERE CompanyName='$CompanyName' ";

        $result = $connection->query($sql);

        if(!$result){
            $errorMessage= "Invalid query:" . $connection->error;
            break;
        }
        $successMessage= "titlesponsor Updated correctly";

        header("location: /titlesponsor/index.php");
        exit;

    }while(false);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Umpire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>New titlesponsor</h2>
        <?php
        if(!empty($errorMessage)){
            echo "
            <div class='alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <input type="hidden" name="CompanyName" value="<?php echo $CompanyName; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">CompanyName</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="CompanyName" value="<?php echo $CompanyName; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">BusinessDomain</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="BusinessDomain" value="<?php echo $BusinessDomain; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Country</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Country" value="<?php echo $Country; ?>">
                </div>
            </div>
            <?php
            if( !empty($successMessage)){
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                       <div class='alert-warning alert-dismissible fade show' role='alert'>
                             <strong>$successMessage</strong>
                             <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/titlesponsor/index.php" role="button">Cancel</a>
                </div>
            </div>

        </form>
    </div>
</body>

</html>