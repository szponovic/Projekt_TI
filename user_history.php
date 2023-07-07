<?php
session_start();
if (!isset($_SESSION['logged']['user_id'])) {
    header('Location: login.php');
    exit;
}

// Pobierz ID użytkownika z sesji
$userId = $_SESSION['logged']['user_id'];

// Pobierz historię wypożyczeń użytkownika z bazy danych
include('connect.php');
include_once('navbar.php');
$sql = "SELECT borrowings.*, books.title FROM borrowings
        INNER JOIN books ON borrowings.book_id = books.book_id
        WHERE user_id = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User History</title>
    <style>
        .table-container {
            border: 1px solid #ccc;
            padding: 10px;
            width: 600px;
            margin: 0 auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .return-button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="table-container">
        <h1>User History</h1>
        <table>
            <tr>
                <th>Title</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['from_date']; ?></td>
                    <td><?php echo $row['to_date']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <?php if ($row['status'] === 'wypożyczono'): ?>
                            <button class="return-button" onclick="returnBook(<?php echo $row['borrowing_id']; ?>)">Oddaj</button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <script>
    function returnBook(borrowingId) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Aktualizuj status wiersza w tabeli po oznaczeniu jako oddane
                var row = document.querySelector("tr[data-borrowing-id='" + borrowingId + "']");
                if (row) {
                    var statusCell = row.querySelector(".status");
                    if (statusCell) {
                        statusCell.textContent = "oddano";
                    }
                }
                alert('Wypożyczenie o ID ' + borrowingId + ' zostało oznaczone jako oddane.');
                location.reload(); // Odśwież stronę po zaakceptowaniu alertu
            }
        };
        xhr.send("borrowing_id=" + borrowingId);
    }
</script>
</body>

</html>
