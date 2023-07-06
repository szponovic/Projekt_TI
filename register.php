<?php
    session_start();

    foreach ($_POST as $key => $value) {
        if (empty($value)){
            $_SESSION['error'] = '⛔️ Wypełnij wszystkie dane! ⛔️';
            header('location: register.php');            
            ?>
                <script>
                    history.back();
                </script>
            <?php
            exit();
        }
    }

    if ($_POST['haslo'] != $_POST['haslo2']) {
        $_SESSION['error'] = '⛔️ Hasła nie są równe! ⛔️';
        ?>
            <script>
                history.back();
            </script>
        <?php
        exit();
    }

    require_once('connect.php');
    if (!$connect->connect_errno) {
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $email = $_POST['email'];
        $haslo = $_POST['haslo'];
        $imie = ucwords(strtolower($imie));
        $nazwisko = ucwords(strtolower($nazwisko));

        $sql = "INSERT INTO `users` (`imie`, `nazwisko`, `email`, `haslo`) VALUES (?,?,?,?)";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("ssss", $imie, $nazwisko, $email, $haslo);
        if ($stmt->execute()) {
            $_SESSION['success'] = "✅ Pomyślnie dodano użytkownika! ✅";
            header('location: login_form.php?email=$email');
            exit();
        }else{
            $_SESSION['error'] = '⛔️ Konto o podanym emailu już istnieje ⛔️';
            header('location: register_form.php');   
            ?>
                <script>
                    history.back();
                </script>
            <?php
            exit();
        }

    }else{
        $_SESSION['error'] = '⛔️ Błędne połączenie z bazą danych ⛔️<br>Error: '.$connect->connect_errno;
        header('location: register_form.php');
        ?>
            <script>
                history.back();
            </script>
        <?php
        exit();
    }
?>
