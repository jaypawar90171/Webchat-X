<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect to Database</title>
</head>
<body>
    <?php
        // echo "Hello!";
        // echo "<br>";

        // Connecting to Database
        $servername = "localhost";
        $username = "root";
        $password = "";

       

        //Create Connection
        $conn = mysqli_connect($servername, $username, $password);
        if(!$conn)
        {
            die("Connection not successful1<br>".mysqli_connect_error());
        }
        else
        {
            echo "Connection was Successful<br>";
        }

        $sql = "CREATE DATABASE demo_db2"; //Creating database using php
        $result = mysqli_query($conn, $sql);

        if($result)
        {
            echo "The Database was created Successfully..!!<br>";
        }
        else
        {
            echo "The Databasse was not created because---1>".mysqli_error($conn);
        }
        
        
    ?>
</body>
</html>