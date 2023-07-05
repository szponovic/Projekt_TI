<?php
    session_start();

    if (isset($_SESSION['logged']['email'])){
        header('location: books.php'); 
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
        include('navbar.php');
    ?>
 
    <form action="register.php" method="post">
        <div class="main_container">
            <div class="form_block solid_border">
                <div class="form_line"><b>REJESTRACJA</b></div>
                <div class="form_line">
                    imię
                    <input type="text" name="imie">
                </div>
                <div class="form_line">
                    nazwisko
                    <input type="text" name="nazwisko">
                </div>
                <div class="form_line">
                    email
                    <input type="text" name="email">
                </div>
                <div class="form_line">
                    hasło
                    <input type="password" name="haslo">
                </div>
                <div class="form_line">
                    powtórz hasło
                    <input type="password" name="haslo2">
                </div>
                <div class="form_line"><a href="login_form.php">Masz już konto? Kliknij tu, by się zalogować.</a></div>
                <div class="form_line error">
                <?php
                    if (isset($_SESSION['error'])){
                        echo $_SESSION['error'];      
                        }
                        unset($_SESSION['error']);
                    ?>
                </div>
                <div class="form_line"><button type="submit">zarejestruj</button></div>
            </div>
        </div>
    </form>

</body>
</html>
