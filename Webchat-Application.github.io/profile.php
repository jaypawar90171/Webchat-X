<?php
    include("php/config.php");
    session_start();

    if(isset($_POST['new_fname']) && isset($_POST['new_lname']))
    {
        $fname = $_POST['new_fname'];
        $lname = $_POST['new_lname'];
        $sql = "UPDATE users SET `fname` = '{$fname}', `lname` = '{$lname}' WHERE unique_id = {$_SESSION['unique_id']}";
        if(mysqli_query($conn, $sql))
        {
            echo "<script>alert('Successfully Updated Username')</script>";
            header("Location:users.php");
        }
        else
        {
            echo "The username cannot be changed";
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
                        <label>First Name</label>
                        <input type="text" name="user" placeholder="Enter your current First name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="nuser" placeholder="Enter your current last name" required>
                    </div>
                    <div class="field input">
                        <label>New First Name</label>
                        <input type="text" name="new_fname" placeholder="Enter your new fname" required>
                    </div>
                    <div class="field input">
                        <label>New Last Name</label>
                        <input type="text" name="new_lname" placeholder="Enter your new lname" required>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Change Username" name="login">
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