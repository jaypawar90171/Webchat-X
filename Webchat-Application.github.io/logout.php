<?php
  session_start();
  $query2 = "UPDATE `users` SET `status`='offline' WHERE (`unique_id` = {$_SESSION['unique_id']}) ;";
  $sql2 = mysqli_query($conn, $query2);
  if($sql2)
  {
    session_unset();
    session_destroy();
    header("Location:login.php");
  }
  
?>