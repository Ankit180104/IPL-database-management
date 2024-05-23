<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container my-5">
    <h2>Update Match</h2>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "IPL";

    $connection = new mysqli($servername, $username, $password, $database);

    $Match_ID = "";
    $TeamID = "";
    $TeamRuns = "";
    $four_s = "";
    $six_s = "";
    $Wickets = "";
    $Winner = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!isset($_GET["Match_ID"])) {
            header("location: /played/index.php");
            exit;
        }
        $Match_ID = $_GET["Match_ID"];

        $sql = "SELECT * FROM played WHERE Match_ID='$Match_ID'";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("location: /played/index.php");
            exit;
        }

        $Match_ID = $row["Match_ID"];
        $TeamID = $row["TeamID"];
        $TeamRuns = $row["TeamRuns"];
        $four_s = $row["four_s"];
        $six_s = $row["six_s"];
        $Wickets = $row["Wickets"];
        $Winner = $row["Winner"];
    } else {
        $Match_ID = $_POST["Match_ID"];
        $TeamID = $_POST["TeamID"];
        $TeamRuns = $_POST["TeamRuns"];
        $four_s = $_POST["four_s"];
        $six_s = $_POST["six_s"];
        $Wickets = $_POST["Wickets"];
        $Winner = $_POST["Winner"];

        if (empty($Match_ID) || empty($TeamID) || empty($TeamRuns) || empty($four_s) || empty($six_s) || empty($Wickets) || empty($Winner)) {
            $errorMessage = "All the fields are required";
        } else {
            $sql = "UPDATE played SET TeamID='$TeamID', TeamRuns='$TeamRuns', `four_s`='$four_s', `six_s`='$six_s', Wickets='$Wickets', Winner='$Winner' WHERE Match_ID='$Match_ID'";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Invalid query:" . $connection->error;
            } else {
                $successMessage = "Match Updated correctly";
                header("location: /played/index.php");
                exit;
            }
        }
    }
    ?>

    <form method="post">
        <input type="hidden" name="Match_ID" value="<?php echo $Match_ID; ?>">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Match_ID</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="Match_ID_input" value="<?php echo $Match_ID; ?>">
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
                <input type="text" class="form-control" name="four_s" value="<?php echo $four_s; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">6s</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="six_s" value="<?php echo $six_s; ?>">
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
                <a class="btn btn-outline-primary" href="/played/index.php" role="button">Cancel</a>
            </div>
        </div>

    </form>
</div>
</body>
</html>
