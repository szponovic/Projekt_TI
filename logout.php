<?php
    session_start();
    if (isset($_SESSION['logged']['email'])){
        session_destroy();
        session_start();
        $_SESSION['success'] = "✅ Pomyślnie wylogowano ✅";
        header('location: login_form.php'); 
    }
?>
