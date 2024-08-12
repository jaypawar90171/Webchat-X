<?php
    include("php/config.php");
    session_start();
    if(!isset($_SESSION['unique_id']))
    {
        header("location:login.php");
    }

    if(isset($_POST['nuser']))
    {
        $pass = $_POST['nuser'];
        $cpass = $_POST['new_pass'];
        if($pass == $cpass)  // Check whether the both paassword are matched or not..!!
        {
            $sql = "UPDATE `users` SET `password` = '{$pass}' WHERE unique_id = {$_SESSION['unique_id']};";
            if(mysqli_query($conn,$sql))
            {
                echo "<script>alert('Password has been changed...!!')</script>";
                header("Location:login.php");
            }
        }
        else
        {
            echo " Both Password cannot matched..!! Please re-enter the password";
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
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter your current Password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field input">
                        <label> New Password</label>
                        <input type="password" name="nuser" placeholder="Enter your new Password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field input">
                        <label>Confirm Password</label>
                        <input type="password" name="new_pass" placeholder="Confirm your password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Change Password" name="login">
                    </div>
            </form> 
            <div class="link">Not yet signed up? <a href="index.php">Sign up</a></div>
        </section>
    </div>
    <div class="footer">
        <p>Chat Application</p>
        <p>Created By Jay & Sanika</p>
    </div>
    <!-- <script src="javascript/users.js"></script> -->
    <script src="javascript/pass-show.js"></script>
    <!-- <script src="javascript/login.js"></script> -->
    
    
</body>
</html>