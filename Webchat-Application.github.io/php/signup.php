<?php
    include_once "config.php";
    session_start();
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($pass))
    {
        //to check if the email is validate or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            // to check the email is already exists in database or not
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE eamil = '{$email}'");
            if(mysqli_num_rows($sql) > 0)
            {
                // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
                echo "$email This email is already exist";
            }
            else
            {
                if(isset($_FILES['image']))
                {
                    $img_name = $_FILES['image']['name'];
                    // $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    $extension = ['png', 'jpg', 'jpeg'];
                    if(in_array($img_ext, $extension) === true)
                    {
                        $time = time();
                        $random_id = rand(time(), 10000000);
                        $new_img_name = $random_id.".jpg";
                        if(move_uploaded_file($tmp_name, "images/".$new_img_name))
                        {
                            $status = "Active Now";
                            

                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                 VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$pass}', '{$new_img_name}', '{$status}')");

                            if($sql2)
                            {
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0)
                                {
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                }
                            }
                            else
                            {
                                echo "Somethong went wrong";
                            }
                        }
                        
                    }
                    else
                    {
                        echo "Please select a valid image file - 'jpg' 'jpeg' 'png'";
                    }
                }
                else
                {
                    // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
                    echo "Please select an Image";
                }
            }
        }
        else
        {
            echo $email . "this is not a valid email";
        }
    }
    else
    {
        echo "All inputs fields are required";
    }
    
?>