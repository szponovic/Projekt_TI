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

    <!-- Pasek nawigacji -->
    <div class="nav_container">
        <li><a class="" href="">Wyloguj</a></li>
        <li><a href="">Spis ksiazek</a></li>

    </div><br>

    <!-- Zawartość -->
    <!-- Tutaj wczyta ilosc ksiazek z bazy danych -->
    <!-- Kazda wartosc nazwa, gatunek, il. stron, ocena będzie w osobnej zmiennej -->
    <?php
    for ($x = 0; $x <= 10; $x++) {
        ?>
        <div class="main_container">
            <div class="mid_container">
                <div class="middle_block" id="user_info"><b>Tytuł:</b> ...... ........</div>

                <div class="left_block" id="user_info">

                    <div class="info">

                        <div class="line"><b>Autor</b></div>
                        <div class="line">............</div>
                        <div class="line"><b>Gatunek</b></div>
                        <div class="line">............</div>
                        <div class="line"><b>Ilość stron</b></div>
                        <div class="line">............</div>
                        <div class="line"><b>Ocena</b></div>
                        <div class="line">............</div>

                    </div>
                    <div class="line">
                        <a href="book_reservation.php"><img src="./img/sherlock.jpg" alt="Sherlock"></a>
                    </div>
                </div>

            </div><br>



        </div>
        <?php
    }
    ?>

    <!-- Zawartość -->
</body>

</html>
