<?php
    session_start();

    require_once('connect.php');
    if (!$connect->connect_errno) {
        $book_id = $_POST['change_picked'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $genre = $_POST['genre'];
        $year = $_POST['year'];
        $picture = $_POST['picture'];
        $status = $_POST['status'];
        $description = $_POST['description'];

        $sql = "UPDATE `books` SET `title`=? WHERE `book_id`=$book_id";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("s", $title);
        if ($stmt->execute()) {

        }else{
            ?>
                <script>
                    history.back();
                </script>
            <?php
            exit();
        }
        $sql = "UPDATE `books` SET `author`=? WHERE `book_id`=$book_id";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("s", $author);
        if ($stmt->execute()) {

        }else{
            ?>
                <script>
                    history.back();
                </script>
            <?php
            exit();
        }
        $sql = "UPDATE `books` SET `genre`=? WHERE `book_id`=$book_id";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("s", $genre);
        if ($stmt->execute()) {

        }else{
            ?>
                <script>
                    history.back();
                </script>
            <?php
            exit();
        }
        $sql = "UPDATE `books` SET `year`=? WHERE `book_id`=$book_id";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("s", $year);
        if ($stmt->execute()) {

        }else{
            ?>
                <script>
                    history.back();
                </script>
            <?php
            exit();
        }
        $sql = "UPDATE `books` SET `picture`=? WHERE `book_id`=$book_id";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("s", $picture);
        if ($stmt->execute()) {

        }else{
            ?>
                <script>
                    history.back();
                </script>
            <?php
            exit();
        }
        $sql = "UPDATE `books` SET `status`=? WHERE `book_id`=$book_id";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("s", $status);
        if ($stmt->execute()) {

        }else{
            ?>
                <script>
                    history.back();
                </script>
            <?php
            exit();
        }
        $sql = "UPDATE `books` SET `description`=? WHERE `book_id`=$book_id";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("s", $description);
        if ($stmt->execute()) {

        }else{
            ?>
                <script>
                    history.back();
                </script>
            <?php
            exit();
        }
        header('location: https://localhost/projekt7/book_management.php');

    }else{
        header('location: register.php');
        ?>
            <script>
                history.back();
            </script>
        <?php
        exit();
    }
?>
