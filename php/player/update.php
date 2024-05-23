<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "IPL";


$connection = new mysqli($servername, $username, $password, $database);

$PlayerID="";
$Name="";
$Nationality= "";
$DoB= "";
$Role= "";
$StrikeRate= "";
$BowlingStyle= "";
$BattingStyle= "";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']== 'GET'){

    if(!isset($_GET["PlayerID"])){
        header("location: /player/index.php");
        exit;
    }
    $PlayerID=$_GET["PlayerID"];


    $sql="SELECT * FROM players WHERE PlayerID='$PlayerID' ";
    $result = $connection->query($sql);
    $row=$result->fetch_assoc();

    if(!$row){
        header("location: /player/index.php");
        exit;
    }
    $PlayerID=$row["PlayerID"];
    $Name=$row["Name"];
    $Nationality=$row["Nationality"];
    $DoB=$row["DoB"];
    $Role=$row["Role"];
    $StrikeRate=$row["StrikeRate"];
    $BowlingStyle=$row["BowlingStyle"];
    $BattingStyle=$row["BattingStyle"];
}
else{
    $PlayerID=$_POST["PlayerID"];
    $Name=$_POST["Name"];
    $Nationality=$_POST["Nationality"];
    $DoB=$row["DoB"];
    $Role=$row["Role"];
    $StrikeRate=$row["StrikeRate"];
    $BowlingStyle=$row["BowlingStyle"];
    $BattingStyle=$row["BattingStyle"];

    do{
        if(empty($PlayerID) || empty($Name) || empty($Nationality) || empty($DoB) || empty($Role) || empty($StrikeRate) || empty($BowlingStyle) || empty($BattingStyle)){
            $errorMessage= "All the fields are required";
            break;
        }

        $sql = "UPDATE player " .
               "SET Name='$Name',Nationality='$Nationality',Nationality='$DoB',Nationality='$Role',StrikeRate='$StrikeRate',BowlingStyle='$BowlingStyle',Nationality='$BattingStyle' " . 
               "WHERE PlayerID='$PlayerID' ";

        $result = $connection->query($sql);

        if(!$result){
            $errorMessage= "Invalid query:" . $connection->error;
            break;
        }
        $successMessage= "player Updated correctly";

        header("location: /player/index.php");
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
        <h2>New Player</h2>
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
            <input type="hidden" name="PlayerID" value="<?php echo $PlayerID; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">PlayerID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="PlayerID" value="<?php echo $PlayerID; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Name" value="<?php echo $Name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nationality</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Nationality" value="<?php echo $Nationality; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">DoB</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="DoB" value="<?php echo $DoB; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Role</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Role" value="<?php echo $Role; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">StrikeRate</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="StrikeRate" value="<?php echo $StrikeRate; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">BowlingStyle</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="BowlingStyle" value="<?php echo $BowlingStyle; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">BattingStyle</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="BattingStyle" value="<?php echo $BattingStyle; ?>">
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
                    <a class="btn btn-outline-primary" href="/player/index.php" role="button">Cancel</a>
                </div>
            </div>

        </form>
    </div>
</body>

</html>