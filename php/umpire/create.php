<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "IPL";


$connection = new mysqli($servername, $username, $password, $database);

$Umpire_ID="";
$Name= "";
$YOE="";
$Country="";

$errorMessage="";
$successMessage="";

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $Umpire_ID=$_POST["Umpire_ID"];
    $Name=$_POST["Name"];
    $YOE=$_POST["YOE"];
    $Country=$_POST["Country"];

    do{
        if(empty($Umpire_ID) || empty($Name) || empty($YOE) || empty($Country)){
            $errorMessage= "All the fields are required";
            break;
        }

        $sql = "INSERT INTO umpire (Umpire_ID, Name, YOE, Country) " .
               "VALUES ('$Umpire_ID','$Name','$YOE','$Country')";
        $result = $connection->query($sql);

        if(!$result){
            $errorMessage= "Invalid query:" . $connection->error;
            break;
        }

        $Umpire_ID="";
        $Name="";
        $YOE="";
        $Country="";
        
        $successMessage= "Umpire added correctly";

      header("location: /umpire/index.php");
      exit;

    } while(false);
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
        <h2>New Umpire</h2>
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
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Umpire_ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Umpire_ID" value="<?php echo $Umpire_ID; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Name" value="<?php echo $Name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">YOE</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="YOE" value="<?php echo $YOE; ?>">
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
                    <a class="btn btn-outline-primary" href="/Umpire/index.php" role="button">Cancel</a>
                </div>
            </div>

        </form>
    </div>
</body>

</html>