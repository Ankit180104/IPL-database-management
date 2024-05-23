<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>List of umpire</h2>
        <a class="btn btn-primary" href="/umpire/create.php" role="button">New Umpire</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Umpire_ID</th>
                    <th>Name</th>
                    <th>YOE</th>
                    <th>Country</th>
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

                $sql = "SELECT * From umpire";
                $result = $connection->query($sql);
                if (!$result) {
                    die("Invalid query:" . connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" . $row["Umpire_ID"] . "</td>
                    <td>" . $row["Name"] . "</td>
                    <td>" . $row["YOE"] . "</td>
                    <td>" . $row["Country"] . "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/umpire/update.php?Umpire_ID=$row[Umpire_ID]'> Update</a>
                        <a class='btn btn-danger btn-sm' href='/umpire/delete.php?Umpire_ID=$row[Umpire_ID]'> Delete</a>
                    </td>
                </tr>";
                }
                ?>
            </tbody>
        </table>
</body>

</html>