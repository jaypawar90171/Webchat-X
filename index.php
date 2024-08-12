<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
    include("php/config.php");
    session_start();
   
if($_SERVER['REQUEST_METHOD']=="POST" ){
    if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['pass']))
    {
        $fname = $_POST['fname'];
        $lname =$_POST['lname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        // to check if the email is validate or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            // to check the email is already exists in database or not
            $qur = "SELECT * FROM `users` WHERE `email`='$email'";
            $sql = mysqli_query($conn, $qur);
            
            if(mysqli_num_rows($sql) > 0)
            {
                // echo "$email This email is already exist";
                echo "<script>alert('This email is already exist in a database...!!')</script>";
            }
            else
            {
                if(isset($_FILES['image']))
                {
                    $img_name = $_FILES['image']['name'];
                    // $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    // $img_explode = explode('.', $img_name);
                    $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);

                    $extension = ['png', 'jpg', 'jpeg'];
                    if(in_array($img_ext, $extension) === true)
                    {
                        $time = time();
                        $random_id = rand(time(), 10000000);

                        $new_img_name = $random_id.".".$img_ext;
                        if(move_uploaded_file($tmp_name, "php/images/".$new_img_name))
                        {
                            $status = "offline";
                            

                            $sql2 = "INSERT INTO users (unique_id, fname, lname, email, `password`, img, `status`)
                                                 VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$pass}', '{$new_img_name}', '{$status}')";

                           
                           
                            if(mysqli_query($conn,$sql2))
                            {
                                 echo "<script>
                                  alert('JavaScript Alert Box by PHP');
                                 </script>";
                                header("Location:login.php");
                                
                            //     echo '
                            //     <script type="text/JavaScript">
                            //    swal({
                            //         title: "success",
                            //         text: "Registration succesfull",
                            //         icon:"success",
                            //         button:"Ok",
                            //       });
                            //     </script>';
                                
                            }


                            //     echo "<script>alert('Successfully')</script>";
                            //     //header();
                            //     // $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            //     // if(mysqli_num_rows($sql3) > 0)
                            //     // {
                            //     //     $row = mysqli_fetch_assoc($sql3);
                            //     //     $_SESSION['unique_id'] = $row['unique_id'];
                            //     //     echo "success";
                            //     // }
                            // }
                            // else
                            // {
                            //     echo "Somethong went wrong";
                            // }
                        }
                        
                    }
                    else
                    {
                        echo "Please select a valid image file - 'jpg' 'jpeg' 'png'";
                    }
                }
                else
                {
                    // echo "Please select an Image";
                    echo '<script>alert("Please select an Image..!!")</script>';
                }
            }
        }
        else
        {
            // echo $email . "this is not a valid email";
            echo '<script>alert("this is not a valid email..!!")</script>';   
        }
      
    }
    else
    {
        echo "All inputs fields are required";
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up Page</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  

</head>
<style>
    .footer {
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
        <section class="form signup">
            <header>Web Chat Application</header>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="error-txt">This is an error message</div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" placeholder="First Name" name="fname" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" placeholder="Last Name" name="lname" required>
                    </div>
                </div>
                    <div class="field input">
                        <label>Email</label>
                        <input type="text" placeholder="Enter your email" name="email" required>
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" placeholder="Enter password" name="pass" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field">
                        <label>Image</label>
                        <input type="file" name="image" required>
                    </div>
                    <div class="field button">
                        <input type="submit" class="submit-btn" value="Continue to chat" name="submit">
                    </div>
            </form> 
            <div class="link">Already singned up? <a href="login.php">Login Now</a></div>
        </section>
    </div>
    <div class="footer">
        <p>Chat Application</p>
        <p>Created By Jay & Sanika</p>
    </div>
    

    <script src="javascript/pass-show.js"></script>
    <!-- <script src="javascript/signup.js"></script> -->
</body>
</html>