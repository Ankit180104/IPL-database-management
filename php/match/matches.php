<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="margin: 50px;">
    <h1>Matches</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Match ID</th>
                <th>Match Type</th>
                <th>Date</th>
                <th>Stadium Name</th>
                <th>City</th>
                <th>Team ID</th>
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

            $sql="SELECT * From matches";
            $result=$connection->query($sql);

            if(!$result){
                die("Invalid query:".connection->error);
            }

            while($row=$result->fetch_assoc()){
                echo "<tr>
                    <td>". $row["Match_ID"] ."</td>
                    <td>". $row["Match_Type"] ."</td>
                    <td>". $row["Date"] ."</td>
                    <td>". $row["Stadium_Name"] ."</td>
                    <td>". $row["City"]."</td>
                    <td>". $row["Team_ID"]."</td>
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