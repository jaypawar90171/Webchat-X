<?php
     session_start();
     if(!isset($_SESSION['unique_id']))
     {
         header("location:login.php");
     }
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
    <div class="wrapper">
        <section class="chat-area">
           <header>
            <?php
                include("php/config.php");
                $user_id = $_GET['user_id'];
                
                $query = "SELECT * FROM `users` WHERE `unique_id`=".$user_id.";";
                $sql = mysqli_query($conn, $query);
                if(mysqli_num_rows($sql) > 0)
                {
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>
                

                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
               <img src="php/images/<?php echo $row['img'] ?>" alt="">
                <div class="detalis">
                    <span><?php echo $row['fname'] . " " . $row['lname']  ?></span>
                    <p><?php echo $row['status'] ?></p>
                </div>
            <!-- </div> -->
            </header>
            <div class="chat-box">
                <!-- <?php
                include("php/config.php"); 
                $outgoing_id = $_SESSION['unique_id'];
                $incoming_id = $_GET['user_id'];
                $output = "";

                $sql = "SELECT * FROM messages WHERE (`msg_outgoing_id` = '$outgoing_id' AND `msg_incoming_id` = '$incoming_id') OR (`msg_outgoing_id` = '$incoming_id' AND `msg_incoming_id` = '$outgoing_id') ORDER BY msg_id" ;
                $query =mysqli_query($conn, $sql);
                if(mysqli_num_rows($query) > 0)
                {
                    while($row = mysqli_fetch_assoc($query))
                    {
                        if($row['msg_outgoing_id'] === $outgoing_id) // if its true then it is a msg sender
                        {
                            $output .= '<div class="chat outgoing">
                                        <div class="details">
                                            <p>'. $row['msg'] .'</p>
                                        </div>
                                        </div>';
                        }
                        else  // this is a msg reciever
                        {
                            $output .= '<div class="chat incoming">
                                        <img src="php/images/'.$row['msg_outgoing_id'].'.jpg" alt="">
                                        <div class="details">
                                            <p>'. $row['msg'] .'</p>
                                        </div>
                                        </div>';
                        }
                    }
                    echo $output;
                }
                ?> -->
                
            </div>
            <form action="php/insert-chat.php" class="typing-area" autocomplete="off">
                <!-- the first is the msg sender_id 
                     and second is the msg reciever_id -->
                <input type="text" name="outgoing_id" value=" <?php echo $_SESSION['unique_id']; ?>" hidden> 
                <input type="text" name="user_id" value=" <?php echo $_GET['user_id']; ?>" hidden> 
                <input type="text" name="incoming_id" value=" <?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here...">
                <button class="button"><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>

    <script src="javascript/chat.js"></script>
</body>
</html> 