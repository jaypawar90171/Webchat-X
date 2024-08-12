
<?php
    // include("header.php");
    // include("navbar.php");
    include("php/config.php");
    session_start();
   
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST["login"] )){
    if(!empty($_POST['email']) && !empty($_POST['password']))
    {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        // to check if the email is validate or not

        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            // to check the email is matched with the  database or not
            $qur = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$pass'";
            $sql = mysqli_query($conn, $qur);
            
            if(mysqli_num_rows($sql) > 0)
            {
                while($row = mysqli_fetch_assoc($sql))
                {
                    $query2 = "UPDATE `users` SET `status`='active'";
                    $sql2 = mysqli_query($conn, $query2);
                    $_SESSION['unique_id'] = $row["unique_id"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["status"] = $row["status"];

                }
                header("Location:users.php");
                
            }
            else{
                // echo "user not found";
                echo '<script>alert("User Not Found Please try again later...!!")</script>';
                
            }
        }

    }
       
}
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <script src="jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<style>

.footer 
{
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: Black;    
    color: white;
    text-align: right;
}
</style>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Web Chat Application</header>
            <form action="#" method="POST">
                <div class="error-txt">This is an error message</div>
                    <div class="field input">
                        <label>Email Address</label>
                        <input type="text" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <i class="fas fa-eye"></i>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue to chat" name="login">
                    </div>
            </form> 
            <div class="link">Not yet signed up? <a href="index.php">Sign up</a></div>
        </section>
    </div>
    <div class="footer">
        <p>Chat Application</p>
        <p>Created By Jay & Sanika</p>
    </div>
    <script src="javascript/users.js"></script>
    <script src="javascript/pass-show.js"></script>
    <!-- <script src="javascript/login.js"></script> -->
    
</body>
</html>