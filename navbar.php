<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    
    <div class="navbar">
        <div class="navbar_sides">
            <div class="navbar_cell" id="logo">
                <img src="./img/logo.png">
            </div>
            <div class="navbar_cell" id="part_lib_name"> 
                Biblioteka im. Juliusza Kobrzyńskiego
            </div>
            <div class="navbar_cell" id="full_lib_name"> 
                Biblioteka im. Juliusza Kobrzyńskiego w Zamościu 
            </div>
        </div>
        <div class="navbar_sides right">
            <div class="navbar_cell">
                <div class="navigation">
                    <a href="books.php">KATALOG</a>
                </div>
            </div>

            <?php
            if (isset($_SESSION['logged']['role_id']) && $_SESSION['logged']['role_id']==3){
                echo <<<END
                <div class="navbar_cell dropdown">
                    <div class="navigation">
                        ZARZĄDZANIE
                        <div class="dropdown_content">
                            <a href="">WYPOŻYCZENIA</a>
                        </div>
                        <div class="dropdown_content">
                            <a href="user_management.php">UŻYTKOWNICY</a>
                        </div>
                        <div class="dropdown_content">
                            <a href="book_management.php">BAZA KSIĄŻEK</a>
                        </div>
                    </div>
                </div>
                END;
            }
            ?>

            <div class="navbar_cell dropdown">
                <div class="navigation">
                    KONTO
                    <?php
                    if (isset($_SESSION['logged']['email'])) {
                        echo <<<END
                        <div class="dropdown_content">
                            <a href="profile.php">PROFIL</a>
                        </div>
                        <div class="dropdown_content">
                            <a href="logout.php">WYLOGUJ</a>
                        </div>
                        END;
                    } else {
                        echo <<<END
                        <div class="dropdown_content">
                            <a href="login_form.php">LOGOWANIE</a>
                        </div>
                        <div class="dropdown_content">
                            <a href="register_form.php">REJESTRACJA</a>
                        </div>
                        END;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="under_nav_space"></div>

</body>
</html>
