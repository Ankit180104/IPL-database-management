<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Year Wise Player Details</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Player ID</th>
                <th>Year</th>
                <th>Team ID</th>
                <th>Total Wickets</th>
                <th>Total Runs</th>
                <th>Maximum Wickets</th>
                <th>Maximum Wickets Runs</th>
                <th>Maximum Runs</th>
                <th>PlayerPrice</th>
                <th>Out_NotOut</th>
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

            $sql="SELECT * From yearwiseplayerdetails";
            $result=$connection->query($sql);

            if(!$result){
                die("Invalid query:".connection->error);
            }

            while($row=$result->fetch_assoc()){
                echo "<tr>
                    <td>". $row["PlayerID"] ."</td>
                    <td>". $row["Year"] ."</td>
                    <td>". $row["TeamID"] ."</td>
                    <td>". $row["TotalWickets"] ."</td>
                    <td>". $row["TotalRuns"]."</td>
                    <td>". $row["MaximumWickets"]."</td>
                    <td>". $row["MaximumWicketsRuns"] ."</td>
                    <td>". $row["MaximumRuns"] ."</td>
                    <td>". $row["PlayerPrice"] ."</td>
                    <td>". $row["Out_NotOut"] ."</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='update'> Update</a>
                        <a class='btn btn-danger btn-sm' href='delete'> Delete</a>
                    </td>
                </tr>"; 
            }
            ?>
            </tbody>
        </table>
</body>
</html>