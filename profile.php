<?php
session_start(); // Uruchomienie sesji
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
// Pobranie danych użytkownika z bazy danych
include('connect.php');
include_once('navbar.php');
    ?>

    <!-- Pasek nawigacji -->

    <!-- Zawartość -->
    <!-- Tutaj wczyta ilosc ksiazek z bazy danych -->
    <!-- Kazda wartosc nazwa, gatunek, il. stron, ocena będzie w osobnej zmiennej -->
    <?php



    include('connect.php');
    // Fetch all books from the table
    $sql = "SELECT * FROM books";
    $result = $connect->query($sql);

$user_id = $_SESSION['logged']['user_id'];
$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Wyświetlenie danych użytkownika
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .nav_container {
            background-color: #f2f2f2;
            padding: 10px;
            display: flex;
            justify-content: flex-end;
        }

        .nav_container li {
            list-style-type: none;
            margin-right: 10px;
            display: inline;
        }

        .main_container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
        }

        .main_container h1 {
            margin-top: 0;
        }

        .profile_info p {
            margin: 10px 0;
        }

        .profile_info b {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="main_container">
        <h1>Profil użytkownika</h1>
        <div class="profile_info">
            <p><b>Imię:</b> <?php echo $row['imie']; ?></p>
            <p><b>Nazwisko:</b> <?php echo $row['nazwisko']; ?></p>
            <p><b>Email:</b> <?php echo $row['email']; ?></p>
            <p><b>Hasło:</b> <span id="password"><?php echo '**********'; ?></span> <button id="reveal_button">Odsłoń</button></p>
            <p><b>Rola:</b> <?php echo $row['role_id']; ?></p>
        </div>
    </div>

    <style>
        .profile_info p {
            display: flex;
            align-items: center;
        }

        .profile_info button {
            margin-left: 10px;
        }
    </style>

    <script>
        var passwordSpan = document.getElementById("password");
        var revealButton = document.getElementById("reveal_button");
        revealButton.addEventListener("click", function() {
            passwordSpan.textContent = '<?php echo $row['haslo']; ?>';
            revealButton.style.display = 'none';
        });
    </script>

    <div style="text-align: center;">
        <a href="user_history.php"><button type="button">User History</button></a>
    </div>
</body>

</html>
