<?php
    session_start();
    
    if (isset($_SESSION['logged']['email'])){
        header('location: cat.php'); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php
        include('nav_man.php');
    ?>

    <form action="login.php" method="post">
        <div class="main_container">
            <div class="form_block solid_border">
                <div class="form_line"><b>LOGOWANIE</b></div>
                <div class="form_line">
                    email <br>
                    <input type="text" name="email">
                </div>
                <div class="form_line">
                    hasło <br>
                    <input type="password" name="haslo">
                </div>
                <div class="form_line"><a href="">Nie masz jeszcze konta? Kliknij tu, by się zarejestrować.</a></div>
                <div class="form_line error">
                <?php
                    if (isset($_SESSION['error'])){
                        echo $_SESSION['error']; 
                        }
                        unset($_SESSION['error']);
                    if (isset($_SESSION['success'])){
                        echo $_SESSION['success'];      
                        }
                        unset($_SESSION['success']);
                    ?>
                </div>
                <div class="form_line"><button type="submit">zaloguj</button></div>
            </div>
        </div>
    </form>

</body>
</html> 

