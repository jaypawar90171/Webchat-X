<?php 

    //when the session is closed the user can't access the users page directly they must have the logged in from the
    // login page and they will directly redirected to the login page
    include "header.php";
    session_start();
    if(!isset($_SESSION['unique_id']))
    {
        header("location:login.php");
    }
    // if(isset($_POST["logout"])){
    //     session_destroy();
    //     header("Location:login.php");
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<body>
    <!-- <form action="#" method="POST"> -->

        <div class="wrapper">
            <section class="users">
                <header>
                    <?php
                        include("php/config.php");
                        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");  // Generates the unique_id for the each user and retrieve their information from the database
                        if(mysqli_num_rows($sql) > 0)
                        {
                            $row = mysqli_fetch_assoc($sql);
                        }
                    ?>
                    <div class="content">
                        <img src="php/images/<?php echo $row['img'] ?>" alt="">
                        <div class="detalis">
                    <span><?php echo $row['fname'] . " " . $row['lname']  ?></span>
                    <p><?php echo $row['status'] ?></p>
                </div>
            </div>
            <input type="submit" name="logout" class="logout" value="Logout">
                
            
            </header>
            <div class="search">
                <span class="text">Select an user to start the chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
                
            </div>
            <div class="users-list">
               
                
            </div>
        </section>
    </div>
    <script src="javascript/users.js"></script>
<!-- </form> -->
</body>
</html>