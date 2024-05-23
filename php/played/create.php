<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "IPL";

$connection = new mysqli($servername, $username, $password, $database);

$MatchID = "";
$TeamID = "";
$TeamRuns = "";
$four_s = ""; // Changed variable name from $4s to $four_s
$six_s = ""; // Changed variable name from $6s to $six_s
$Wickets = "";
$Winner = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MatchID = $_POST["MatchID"];
    $TeamID = $_POST["TeamID"];
    $TeamRuns = $_POST["TeamRuns"];
    $four_s = $_POST["4s"]; // Changed variable name from $4s to $four_s
    $six_s = $_POST["6s"]; // Changed variable name from $6s to $six_s
    $Wickets = $_POST["Wickets"];
    $Winner = $_POST["Winner"];

    if (empty($MatchID) || empty($TeamID) || empty($TeamRuns) || empty($four_s) || empty($six_s) || empty($Wickets) || empty($Winner)) {
        $errorMessage = "All the fields are required";
    } else {
        $sql = "INSERT INTO played (MatchID,TeamID,TeamRuns,4s,6s,Wickets,Winner) " .
               "VALUES ('$MatchID','$TeamID','$TeamRuns','$four_s','$six_s','$Wickets','$Winner')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query:" . $connection->error;
        } else {
            $successMessage = "Player added correctly";
            header("location: /played/index.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Played</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>New Match Details</h2>
        <?php
        if (!empty($errorMessage)) {
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
                <label class="col-sm-3 col-form-label">MatchID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="MatchID" value="<?php echo $MatchID; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">TeamID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="TeamID" value="<?php echo $TeamID; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">TeamRuns</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="TeamRuns" value="<?php echo $TeamRuns; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">4s</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="4s" value="<?php echo $four_s; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">6s</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="6s" value="<?php echo $six_s; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Wickets</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Wickets" value="<?php echo $Wickets; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Winner</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Winner" value="<?php echo $Winner; ?>">
                </div>
            </div>
            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                       <div class='alert-success alert-dismissible fade show' role='alert'>
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
                    <a class="btn btn-outline-primary" href="/played/index.php">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
