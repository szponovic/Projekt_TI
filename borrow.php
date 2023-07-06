<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Book</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .frame {
            padding: 20px;
            border: 1px solid black;
            width: 400px;
            text-align: center;
        }

        .frame h1 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="nav_container">
        <li><a class="" href="">Wyloguj</a></li>
        <li><a href="books.php">Spis książek</a></li>
    </div>

    <?php
    include('connections_jan.php');
    ?>

    <div class="container">
        <div class="frame">
        <?php
            if (isset($_GET['id'])) {
                $bookId = $_GET['id'];
                $sql = "SELECT * FROM books WHERE book_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $bookId);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                if ($row) {
                    echo "<h1>Informacje o książce</h1>";
                    echo "<p><b>Tytuł:</b> " . $row['title'] . "</p>";
                    echo "<p><b>Autor:</b> " . $row['author'] . "</p>";
                    echo "<p><b>Opis:</b> " . $row['description'] . "</p>";
                    echo "<p><b>Rok wydania:</b> " . $row['year'] . "</p>";

                    echo "<h1>Wybierz liczbę dni wypożyczenia</h1>";
                    echo "<form action='borrow.php' method='post'>";
                    echo "<input type='hidden' name='id' value='$bookId'>";
                    echo "<input type='radio' id='7days' name='days' value='7'>";
                    echo "<label for='7days'>7 dni</label><br>";
                    echo "<input type='radio' id='14days' name='days' value='14'>";
                    echo "<label for='14days'>14 dni</label><br>";
                    echo "<input type='radio' id='30days' name='days' value='30'>";
                    echo "<label for='30days'>30 dni</label><br>";
                    echo "<button type='submit'>Wypożycz</button>";
                    echo "</form>";
                } else {
                    echo "<p>Książka o podanym ID nie istnieje.</p>";
                }
            } else {
                echo "<p>Nie przekazano poprawnego ID książki.</p>";
            }

            if (isset($_POST['days'])) {
                // Tutaj możesz wprowadzić dane do tabeli borrowings
                // Podpowiedź: Pamiętaj, że musisz odczytać user_id z sesji, nie tylko z formularza
                // oraz użyj funkcji date() i strtotime() do obliczenia daty 'from_date' i 'to_date'
                // i wstaw te dane do tabeli borrowings
            }
            ?>
        </div>
    </div>

</body>

</html>