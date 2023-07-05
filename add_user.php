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
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $email = $_POST['email'];
        $haslo = $_POST['haslo'];
        $role_id = $_POST['role_id'];
        $imie = ucwords(strtolower($imie));
        $nazwisko = ucwords(strtolower($nazwisko));

        $sql = "INSERT INTO `users` (`imie`, `nazwisko`, `email`, `haslo`, `role_id`) VALUES (?,?,?,?,?)";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("sssss", $imie, $nazwisko, $email, $haslo, $role_id);
        if ($stmt->execute()) {
            header('location: https://localhost/projekt7/user_management.php');
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
