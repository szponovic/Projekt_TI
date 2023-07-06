<?php
    session_start();
    if (isset($_SESSION['logged']['email'])) {
        $userEmail = $_SESSION['logged']['email'];
        // Pobierz dodatkowe informacje o użytkowniku z bazy danych lub innego źródła danych
        // Przykładowo:
        $userId = $_SESSION['logged']['user_id'];
        $userName = $_SESSION['logged']['imie'];
        $userLastName = $_SESSION['logged']['nazwisko'];
        $userRoleId = $_SESSION['logged']['role_id'];
        
        // Możesz teraz wykorzystać te zmienne w różnych miejscach na stronie, np. w navbarze
    } else {
        // Użytkownik nie jest zalogowany
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        function go_to_reservation(bookId) {
            window.location.href = 'book_reservation.php?id=' + bookId;
        }
    </script>

</head>

<body>
    <?php
    include_once('navbar.php');
    ?>

    <?php



    include('connect.php');
    // Fetch all books from the table
    $sql = "SELECT * FROM books";
    $result = $connect->query($sql);


    // $row = $result->fetch_assoc();
    // $row["id"]
    

    for ($i = 0; $i < $result->num_rows; $i++) {
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
                        <div class="line"><b>Rok wydania</b></div>
                        <div class="line">
                            <?php echo $row[4]; ?>
                        </div>
                        <div class="line"><b>Opis</b></div>
                        <div class="line">
                            <?php echo $row[7]; ?>
                        </div>

                    </div>
                    <div class="line">

                        <! --Zdjecie ksiazki -->

                            <a onclick="go_to_reservation(<?php echo $row[0]; ?>)"><img src="./img/<?php echo $row[5] ?>"
                                    alt="<?php echo $row[5] ?>"></a>

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
