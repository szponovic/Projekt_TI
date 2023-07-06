<?php
session_start();
include_once('navbar.php');

if (isset($_GET['id']) && isset($_POST['days'])) {
    $bookId = $_GET['id'];
    $borrowDays = $_POST['days'];

    // Pobierz informacje o książce z bazy danych
    include('connect.php');
    $sql = "SELECT title FROM books WHERE book_id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $bookId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $title = $row['title'];
        $userId = $_SESSION['logged']['user_id'];
        $fromDate = date("Y-m-d");
        $toDate = date("Y-m-d", strtotime("+$borrowDays days"));
        $status = "wypożyczono";

        // Wprowadź dane do tabeli borrowings
        $sql = "INSERT INTO borrowings (user_id, book_id, from_date, to_date, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("iisss", $userId, $bookId, $fromDate, $toDate, $status);
        $stmt->execute();

        // Wyświetl potwierdzenie wypożyczenia
        echo "<div class='main_container'>";
        echo "<div class='frame'>";
        echo "<h1>Pomyślnie wypożyczono książkę</h1>";
        echo "<p>Wypożyczono książkę:</p>";
        echo "<div class='profile_info'>";
        echo "<p><b>Tytuł:</b> $title</p>";
        echo "<p><b>Ilość dni:</b> $borrowDays</p>";
        echo "<p><b>Data wypożyczenia:</b> $fromDate</p>";
        echo "<p><b>Data zwrotu:</b> $toDate</p>";
        echo "</div>";
        echo "<a href='books.php'><button type='button'>Kontynuuj</button></a>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "<div class='main_container'>";
        echo "<div class='frame'>";
        echo "<p>Książka o podanym ID nie istnieje.</p>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<div class='main_container'>";
    echo "<div class='frame'>";
    echo "<p>Brak danych wypożyczenia.</p>";
    echo "</div>";
    echo "</div>";
}
?>
