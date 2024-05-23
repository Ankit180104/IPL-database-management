<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h2>List of Players</h2>
        <a class="btn btn-primary" href="/player/create.php" role="button">New Player</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>PlayerID</th>
                    <th>Name</th>
                    <th>Nationality</th>
                    <th>DoB</th>
                    <th>Role</th>
                    <th>StrikeRate</th>
                    <th>BowlingStyle</th>
                    <th>BattingStyle</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "IPL";

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection failed" . $connection->connect_error);
                }

                $sql = "SELECT * From players";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query:" . connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" . $row["PlayerID"] . "</td>
                    <td>" . $row["Name"] . "</td>
                    <td>" . $row["Nationality"] . "</td>
                    <td>" . $row["DoB"] . "</td>
                    <td>" . $row["Role"] . "</td>
                    <td>" . $row["StrikeRate"] . "</td>
                    <td>" . $row["BowlingStyle"] . "</td>
                    <td>" . $row["BattingStyle"] . "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/player/update.php?PlayerID=$row[PlayerID]'> Update</a>
                        <a class='btn btn-danger btn-sm' href='/player/delete.php?PlayerID=$row[PlayerID]'> Delete</a>
                    </td>
                </tr>";
                }
                ?>
            </tbody>
        </table>
</body>

</html>