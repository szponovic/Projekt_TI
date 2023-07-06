<?php
    session_start();

    foreach ($_POST as $value){
        if (empty($value)) {
            $_SESSION['error'] = '⛔️ Wypełnij wszystkie pola! ⛔️';
            ?>
                <script>
                    history.back();
                </script>
            <?php
            exit();
        }
    }

    require_once 'connect.php';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $haslo = isset($_POST['haslo']) ? $_POST['haslo'] : '';

    $sql = "SELECT user_id, imie, nazwisko, email, haslo, role_id FROM `users` WHERE `email` =?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("s", $email);

        if ($result = $stmt->execute()){
            $error = 0;
            $stmt->store_result();
            if ($stmt->num_rows){
                $stmt->execute();
                $result = $stmt->get_result();
                $customer = $result->fetch_assoc();

                if ($haslo == $customer['haslo']){
                    $_SESSION['logged']['user_id'] = $customer['user_id'];
                    $_SESSION['logged']['imie'] = $customer['imie'];
                    $_SESSION['logged']['nazwisko'] = $customer['nazwisko'];
                    $_SESSION['logged']['email'] = $customer['email'];
                    $_SESSION['logged']['role_id'] = $customer['role_id'];
                    session_regenerate_id();
                    $_SESSION['logged']['session_id'] = session_id();
                    setcookie("logged_in", true, time() + 3600, "/");
                    header('location: books.php');
                }else{
                    $error = 1;
                }
            }else{
                $error = 1;
            }

            if ($error != 0){
                $_SESSION['error'] = '⛔️ Błędny login lub hasło ⛔️';
                ?>
                <script>
                    history.back();
                </script> 
                <?php
                    exit();   
            }
        }
        
?>
