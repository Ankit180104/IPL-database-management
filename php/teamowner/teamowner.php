<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="margin: 50px;">
    <h1> Team Owners</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Business Domain</th>
                <th>Country</th>
                
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

            $sql="SELECT * From teamowner";
            $result=$connection->query($sql);

            if(!$result){
                die("Invalid query:".connection->error);
            }

            while($row=$result->fetch_assoc()){
                echo "<tr>
                    <td>". $row["CompanyName"] ."</td>
                    <td>". $row["BusinessDomain"] ."</td>
                    <td>". $row["Country"] ."</td>
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