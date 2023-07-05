<?php
    session_start();

    require_once('connect.php');
    $book_id=$_POST['delete_picked'];

    $sql = "DELETE FROM books WHERE book_id=$book_id";
    $stmt = $connect->prepare($sql);
        
    if ($stmt->execute()) {
        header('location: book_management.php');
        exit();
    }
?>
