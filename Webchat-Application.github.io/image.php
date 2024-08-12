<?php
    include("php/config.php");
    session_start();
    if(isset($_POST['nimage']))
    {
        $new_img_name = $_POST['nimage'];
        $sql3 = "UPDATE `users` SET `img` = `{$new_img_name}` WHERE unique_id = {$_SESSION['unique_id']}";
        if(mysqli_query($conn,$sql3))
        {
            echo "The Profile Photo has been changed";
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
/* *
{
    margin: 5px;
} */
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
                        <label> Email</label>
                        <input type="text" placeholder="Enter your email" name="email" required>
                    </div>
                <div class="field">
                        <label>Image</label>
                        <input type="file" name="nimage" required>
                    </div>
                    <div class="field button">
                        <input type="submit" class="submit-btn" value="Continue to chat" name="submit">
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