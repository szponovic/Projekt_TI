<?php
    session_start();

    if (!(isset($_SESSION['logged']['email'])) || $_SESSION['logged']['role_id']==1){
        header('location: books.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js"></script> 
</head>
<body>

<?php
    include_once('navbar.php');
?>

<div class="main_container">
    <div class="mid_container">

        <button id="add_user" onclick="Add_user()">
            + dodaj nowego użytkownika
        </button>
 
        <div class="middle_block" id="new_user">
            <form action="add_user.php" method="post">
            <div class=input_line>
                imię
                <input type="text" name="imie">
            </div>
            <div class=input_line>
                nazwisko
                <input type="text" name="nazwisko">
            </div>
            <div class=input_line>
                email
                <input type="text" name="email">
            </div>
            <div class=input_line>
                hasło
                <input type="text" name="haslo">
            </div>
            <div class="line"><br>Wybierz rolę:</div>
            <div class="line">
                <div class="role_radios">
                    <div class="radio"><label><input type="radio" name="role_id" value="1" checked> zwykły użytkownik</label></div>
                    <div class="radio"><label><input type="radio" name="role_id" value="2"> bibliotekarz</label></div>
                    <div class="radio"><label><input type="radio" name="role_id" value="3"> administrator</label></div>
                </div>
            </div>
            <div class="buttons">
                <button type="button" onclick="Cancel_add_user()">anuluj</button><button type="submit">potwierdź</button>
            </div>
            </form>
        </div>

        <div class="middle_block" id="user_info">
            <?php
            require_once 'connect.php';
                $sql = "SELECT * FROM `users` INNER JOIN roles ON users.role_id=roles.role_id ORDER BY `user_id`";
                $result = $connect->query($sql);
                echo <<<HEADER
                    <table>
                        <tr>
                            <td style="width:5%">ID</td>
                            <td style="width:30%">Imię i nazwisko</td>
                            <td style="width:25%">Email</td>
                            <td style="width:20%">Rola</td>
                            <td style="width:15%"></td>
                        </tr>
                HEADER;
                while ($user = $result->fetch_assoc()) {
                
                echo <<<USERS
                    <tr>
                        <td style="width:5%">$user[user_id]</td>
                        <td style="width:30%">$user[imie] $user[nazwisko]</td>
                        <td style="width:25%">$user[email]</td>
                        <td style="width:20%">$user[name]</td>
                        <td style="width:15%"><form action="user_management.php" method="post"><input type="hidden" name="change_picked" value="$user[user_id]"> <button type="submit">edytuj</button></form> <form action="user_management.php" method="post"><input type="hidden" name="delete_picked" value="$user[user_id]"><button type="submit">usuń</button></form></td>
                    </tr>   
                USERS;
                }
                echo "</table>";
        echo "</div>";

        if (isset($_POST['delete_picked'])){
            echo <<<PICKED
                <div class="middle_block" id="delete_user">
                    <form action="delete_user.php" method="post">
                        <div class="line">Czy na pewno chcesz usunąć danego użytkownika?</div> 
                        <div class="buttons"><button type="button" onclick="Cancel_delete_user()">nie</button><form action="delete_user.php" method="post"><input type="hidden" name="delete_picked" value="$_POST[delete_picked]"><button type="submit">tak</button></form></div> 
                    </form>
                </div>
            PICKED;
        }

        if (isset($_POST['change_picked'])){
            echo <<<PICKED
            <div class="middle_block" id="choose_role">
                <form action="change_role.php" method="post">
                <input type="hidden" name="change_picked" value="$_POST[change_picked]">
                <div class="line">Wybierz rolę:</div>
                <div class="line">
                    <div class="role_radios"> 
                        <div class="radio"><label><input type="radio" name="role_id" value="1" checked> zwykły użytkownik</label></div>
                        <div class="radio"><label><input type="radio" name="role_id" value="2"> bibliotekarz</label></div>
                        <div class="radio"><label><input type="radio" name="role_id" value="3"> administrator</label></div>
                    </div>
                </div>
                <div class="buttons">
                    <button type="button" onclick="Cancel_pick_user()">anuluj</button><button type="submit">potwierdź</button>
                </div>
                </form>    
            </div>
            PICKED; 
        }
        ?>
    </div>
</div>

</body>
</html>
