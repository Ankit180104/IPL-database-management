<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="margin: 50px;">
    <h1>Head Coach</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>CoachID</th>
                <th>CoachName</th>
                <th>Years of Experience</th>
                <th>DOB</th>
                <th>Country</th>
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
                die("Connection failed" . $connection->connect_error);
            }

            $sql="SELECT * From headcoach";
            $result=$connection->query($sql);

            if(!$result){
                die("Invalid query:" . connection->error);
            }

            while($row=$result->fetch_assoc()){
                echo "<tr>
                    <td>". $row["CoachID"] ."</td>
                    <td>". $row["CoachName"] ."</td>
                    <td>". $row["Years_of_Experience"] ."</td>
                    <td>". $row["DoB"] ."</td>
                    <td>". $row["Country"]."</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/headcoach/update.php?CoachID=$row[CoachID]'> Update</a>
                        <a class='btn btn-danger btn-sm' href='/headcoach/update.php?CoachID=$row[CoachID]'> Delete</a>
                    </td>
                </tr>"; 
            }
            ?>
            </tbody>
        </table>
</body>
</html>