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
        <h2>List of titlesponsor</h2>
        <a class="btn btn-primary" href="/titlesponsor/create.php" role="button">New titlesponsor</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>CompanyName</th>
                    <th>BusinessDomain</th>
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

                $sql = "SELECT * From titlesponsor";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query:" . connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" . $row["CompanyName"] . "</td>
                    <td>" . $row["BusinessDomain"] . "</td>
                    <td>" . $row["Country"] . "</td>
                  
                    <td>
                        <a class='btn btn-primary btn-sm' href='/titlesponsor/update.php?CompanyName=$row[CompanyName]'> Update</a>
                        <a class='btn btn-danger btn-sm' href='/titlesponsor/delete.php?CompanyName=$row[CompanyName]'> Delete</a>
                    </td>
                </tr>";
                }
                ?>
            </tbody>
        </table>
</body>

</html>