<?php
    session_start();

    require_once('connect.php');
    if (!$connect->connect_errno) {
        $user_id = $_POST['change_picked'];
        $role_id = $_POST['role_id'];

        $sql = "UPDATE `users` SET `role_id`=? WHERE `user_id`=$user_id";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("s", $role_id);
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
