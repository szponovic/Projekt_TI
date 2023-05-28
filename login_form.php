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
    include_once('nav_man.html');
    ?>
    <form action="" method="post">
        <div class="form_main_container">
            <div class="form_block solid_border">
                <div class="form_line"><b>LOGOWANIE</b></div>
                <div class="form_line">
                    login <br>
                    <input type="text">
                </div>
                <div class="form_line">
                    hasło <br>
                    <input type="text">
                </div>
                <div class="form_line"><a href="">Nie masz jeszcze konta? Kliknij tu, by się zarejestrować.</a></div>
                <div class="form_line error">Błąd</div>
                <div class="form_line"><button type="submit">potwierdź</button></div>
            </div>
        </div>
    </form>
</body>
</html> 
