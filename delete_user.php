<?php
    session_start();

    require_once('connect.php');
    $user_id=$_POST['delete_picked'];

    $sql = "DELETE FROM users WHERE user_id=$user_id";
    $stmt = $connect->prepare($sql);
        
    if ($stmt->execute()) {
        header('location: user_management.php');
        exit();
    }

?>
