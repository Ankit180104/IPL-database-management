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
        <h2>List of Played matches</h2>
        <a class="btn btn-primary" href="/played/create.php" role="button">Played</a>
        <br>
    <table class="table">
        <thead>
            <tr>
                <th>Match_ID</th>
                <th>TeamID</th>
                <th>TeamRuns</th>
                <th>4s</th>
                <th>6s</th>
                <th>Wickets</th>
                <th>Winner</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $servername="localhost";
            $username="root";
            $password="";
            $database="IPL";

            $connection=new mysqli($servername,$username,$password,$database);

            if($connection->connect_error){
                die("Connection failed".$connection->connect_error);
            }

            $sql="SELECT * From played";
            $result=$connection->query($sql);

            if(!$result){
                die("Invalid query:".connection->error);
            }

            while($row=$result->fetch_assoc()){
                echo "<tr>
                    <td>". $row["Match_ID"] ."</td>
                    <td>". $row["TeamID"] ."</td>
                    <td>". $row["TeamRuns"] ."</td>
                    <td>". $row["four_s"] ."</td>
                    <td>". $row["six_s"]."</td>
                    <td>". $row["Wickets"]."</td>
                    <td>". $row["Winner"] ."</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/played/update.php?Match_ID=$row[Match_ID]'> Update</a>
                        <a class='btn btn-danger btn-sm' href='/played/delete.php?Match_ID=$row[Match_ID]'> Delete</a>
                    </td>
                </tr>"; 
            }
            ?>
            </tbody>
        </table>
</body>
</html>