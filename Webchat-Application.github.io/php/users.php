<?php

    session_start();
    include_once "config.php";
    // include "data.php";

    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT * FROM `users`");
    $output = "";

    // while($row = mysqli_fetch_assoc($sql))
    // {
    //     $sql2 = "SELECT * FROM messages WHERE (msg_incoming_id = {$row['unique_id']}
    //              OR msg_outgoing_id = {$row['unique_id']}) AND (msg_outgoing_id = {$outgoing_id}
    //              OR msg_incoming_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

    //     $query2 = mysqli_query($conn, $sql2);
    //     $row2 = mysqli_fetch_assoc($query2);
    //     if(mysqli_num_rows($query2) > 0)
    //     {
    //         $result = $row2['msg'];
    //     }
    //     else    
    //     {
    //         $result =  "No Message Available";
    //     }

    //     // Trimming thw message if the words are more than 28
    //     (strlen($result) > 28) ? $msg = substr($result, 0 ,28) : $msg = $result;

    // }
    
    if(mysqli_num_rows($sql) == 1)
    {
        $output .= "No User are available to chat";  //if there are only one row in a database then that one row is of currrently logged in user
    }
    elseif(mysqli_num_rows($sql) > 0)
    {
        while($row = mysqli_fetch_assoc($sql))
        {
            
            $sql2 = "SELECT * FROM messages WHERE (msg_incoming_id = {$row['unique_id']}
                    OR msg_outgoing_id = {$row['unique_id']}) AND (msg_outgoing_id = {$outgoing_id}
                    OR msg_incoming_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

            $query2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($query2);
            if(mysqli_num_rows($query2) > 0)
            {
                $result = $row2['msg'];
            }
            else    
            {
                $result =  "No Message Available";
            }

            // Trimming thw message if the words are more than 28
            (strlen($result) > 28) ? $msg = substr($result, 0 ,28) : $msg  = $result ;

            //adding you before the message
            // ($outgoing_id == $row2['msg_outgoing_id']) ? $you = "You: ": $you = "";

            ($row['status'] == "offline") ? $offline = "offline" : $offline = "";

            if($row['unique_id'] != $_SESSION['unique_id'] ){

                $output .= ' <a href="chat.php?user_id='. $row['unique_id'] .'">
                <div class="content">
                <img src="php/images/'.$row['img'] .'" alt="">
                <div class="detalis">
                <span>'. $row['fname'] . " " . $row['lname'] .'</span>
                <p>'.$result.'</p>
                </div>
                </div>  
                <div class="status-dot'.$offline.'">
                <i class="fas fa-circle"></i>
                </div>
                </a>';
            }
        }
    }

    echo $output;

?>