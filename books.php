<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        function go_to_reservation(bookId) {
            window.location.href = 'book_reservation.php?id=' + bookId;
        }
    </script>

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



    include('connections_jan.php');
    // Fetch all books from the table
    $sql = "SELECT * FROM book";
    $result = $conn->query($sql);


    // $row = $result->fetch_assoc();
    // $row["id"]
    

    for ($i = 0; $i < $result->num_rows; $i++) {

        // $row = $result->fetch_assoc();
    
        // for ($i = 0; $i < $result->num_rows; $i++) {
        $row = $result->fetch_row();

        ?>
        <div class="main_container">
            <div class="mid_container">
                <div class="middle_block" id="user_info"><b>Tytuł:</b>
                    <?php
                    echo $row[1]; ?>
                </div>

                <div class="left_block" id="user_info">

                    <div class="info">

                        <div class="line"><b>Autor</b></div>
                        <div class="line">
                            <?php echo $row[2]; ?>
                        </div>
                        <div class="line"><b>Rodzaj</b></div>
                        <div class="line">
                            <?php echo $row[3]; ?>
                        </div>
                        <div class="line"><b>Ilosc stron</b></div>
                        <div class="line">
                            <?php echo $row[4]; ?>
                        </div>
                        <div class="line"><b>Opis</b></div>
                        <div class="line">
                            <?php echo $row[5]; ?>
                        </div>

                    </div>
                    <div class="line">
                        <!--  <a href="book_reservation.php"><img src="./img/sherlock.jpg" alt="Sherlock"></a> -->
                        <! -- -->
                            <a onclick="go_to_reservation(<?php echo $row[0]; ?>)"><img src="./img/sherlock.jpg"
                                    alt="Sherlock"></a>

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