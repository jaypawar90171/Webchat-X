<?php

    session_start();
    if(isset($_SESSION['unique_id']))
    {
        include_once "config.php";
        // $userid = $_GET['user_id'];
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";

        $sql = "SELECT * FROM `messages` WHERE (`msg_outgoing_id` = {$outgoing_id} AND `msg_incoming_id` = {$incoming_id})
                OR (`msg_outgoing_id` = {$incoming_id} AND `msg_incoming_id` = {$outgoing_id}) ORDER BY `msg_id` ";

        $query =mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0)
        {
            while($row = mysqli_fetch_assoc($query))
            {
                if($row['msg_outgoing_id'] == $outgoing_id) // if its true then it is a msg sender
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
    }
    else
    {
        header("location:login.php");
    }

?>

