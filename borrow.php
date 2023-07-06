<?php
session_start();
if (isset($_SESSION['logged']['email'])) {
    $userEmail = $_SESSION['logged']['email'];
    $userId = $_SESSION['logged']['user_id'];
    $userName = $_SESSION['logged']['imie'];
    $userLastName = $_SESSION['logged']['nazwisko'];
    $userRoleId = $_SESSION['logged']['role_id'];
} else {
}
include_once('navbar.php');
?>

<?php
include('connect.php');
if (isset($_GET['id'])) {
    $bookId = $_GET['id'];
    $sql = "SELECT * FROM books WHERE book_id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $bookId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $title = $row['title'];
        $author = $row['author'];
        $description = $row['description'];
        $year = $row['year'];

        echo "<div class='main_container'>";
        echo "<div class='frame'>";
        echo "<h1>Informacje o książce</h1>";
        echo "<div class='profile_info'>";
        echo "<p><b>Tytuł:</b> $title</p>";
        echo "</div>";
        echo "</div>";

        echo "<div class='frame'>";
        echo "<h1>Wybierz liczbę dni wypożyczenia</h1>";
        echo "<div class='profile_info'>";
        echo "<form action='borrow_confirmation.php?id=$bookId' method='post'>";
        echo "<input type='radio' id='7days' name='days' value='7'>";
        echo "<label for='7days'>7 dni</label><br>";
        echo "<input type='radio' id='14days' name='days' value='14'>";
        echo "<label for='14days'>14 dni</label><br>";
        echo "<input type='radio' id='30days' name='days' value='30'>";
        echo "<label for='30days'>30 dni</label><br>";
        echo "<button type='submit'>Kontynuuj</button>";
        echo "</form>";
        echo "</div>";
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
    echo "<p>Nie przekazano poprawnego ID książki.</p>";
    echo "</div>";
    echo "</div>";
}
?>
