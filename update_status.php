<?php
if (isset($_POST['borrowing_id'])) {
    $borrowingId = $_POST['borrowing_id'];

    // Połącz z bazą danych
    include('connect.php');

    // Zaktualizuj status wypożyczenia na "oddano"
    $sql = "UPDATE borrowings SET status = 'oddano' WHERE borrowing_id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $borrowingId);
    $stmt->execute();

    // Zwróć odpowiedź, że aktualizacja została wykonana pomyślnie
    echo "success";
}
?>
