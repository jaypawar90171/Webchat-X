<?php
    while($row = mysqli_fetch_assoc($sql))
    {
        $sql2 = "SELECT * FROM messages WHERE (msg_incoming_id = {$row['unique_id']}
                 OR msg_outgoing_id = {$row['unique_id']}) AND (msg_outgoing_id = {$outgoing_id}
                 OR msg_outgoing_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

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
        (strlen($result) > 28) ? $msg = substr($result, 0 ,28) : $msg = $result;

        

        $output .= ' <a href="chat.php?user_id='. $row['unique_id'] .'">
                    <div class="content">
                    <img src="php/images/'.$row['img'] .'" alt="">
                    <div class="detalis">
                    <span>'. $row['fname'] . " " . $row['lname'] .'</span>
                    <p>'. $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot'.$offline.'">
                    <i class="fas fa-circle"></i>
                    </div>
                    </a>';
    }
    
?>