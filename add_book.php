<?php
    session_start();
    
    foreach ($_POST as $key => $value) {
        if (empty($value)){          
            ?>
                <script>
                    history.back();
                </script>
            <?php
            exit();
        }
    }

    require_once('connect.php');
    if (!$connect->connect_errno) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $genre = $_POST['genre'];
        $year = $_POST['year'];
        $picture = $_POST['picture'];
        $status = $_POST['status'];
        $description = $_POST['description'];

        $sql = "INSERT INTO `books` (`title`, `author`, `genre`, `year`, `picture`, `status`, `description`) VALUES (?,?,?,?,?,?,?)";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("sssssss", $title, $author, $genre, $year, $picture, $status, $description);
        if ($stmt->execute()) {
            header('location: https://localhost/projekt7/book_management.php');
            exit();
        }else{ 
            ?>
                <script>
                    history.back();
                </script>
            <?php
            exit();
        }

    }else{
        ?>
            <script>
                history.back();
            </script>
        <?php
        exit();
    }
?>
