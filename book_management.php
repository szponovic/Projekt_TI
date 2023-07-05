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

        <button id="add_book" onclick="Add_book()">
            + dodaj nową książkę do bazy
        </button>
        
        <div class="middle_block" id="new_book">
            <form action="add_book.php" method="post">
            <div class="up">
                <div class="left">
                    <div class=input_line>
                        tytuł
                        <input type="text" name="title">
                    </div>
                    <div class=input_line>
                        autor
                        <input type="text" name="author">
                    </div>
                    <div class=input_line>
                        gatunek
                        <input type="text" name="genre">
                    </div>
                    <div class=input_line>
                        rok wydania
                        <input type="text" name="year">
                    </div>
                    <div class=input_line>
                        obraz
                        <input type="text" name="picture">
                    </div>
                    <div class=input_line>
                        status
                        <input type="text" name="status">
                    </div>
                </div>
                <div class="right">
                    <div class=input_line>
                        opis
                        <textarea name="description" id="set_desc" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="buttons">
                <button type="button" onclick="Cancel_add_book()">anuluj</button><button type="submit">potwierdź</button>
            </div>
            </form>
        </div>

        <div class="middle_block" id="book_info">
            <?php
            require_once 'connect.php';
                $sql = "SELECT * FROM `books` ORDER BY `book_id`";
                $result = $connect->query($sql);
                echo <<<HEADER
                    <table>
                        <tr>
                            <td style="width:5%">ID</td>
                            <td style="width:30%">Tytuł</td>
                            <td style="width:25%">Autor</td>
                            <td style="width:20%">Status</td>
                            <td style="width:15%"></td>
                        </tr>
                HEADER;
                while ($book = $result->fetch_assoc()) {
                    echo <<<USERS
            
                    <tr>
                        <td style="width:5%">$book[book_id]</td>
                        <td style="width:30%">$book[title]</td>
                        <td style="width:25%">$book[author]</td>
                        <td style="width:20%">$book[status]</td>
                        <td style="width:15%"><form action="book_management.php" method="post"><input type="hidden" name="change_picked" value="$book[book_id]"> <button type="submit">edytuj</button></form> <form action="book_management.php" method="post"><input type="hidden" name="delete_picked" value="$book[book_id]"><button type="submit">usuń</button></form></td>
                    </tr>   
                USERS;
                }
                echo "</table>";

            echo "</div>";

        if (isset($_POST['delete_picked'])){
            echo <<<PICKED
                <div class="middle_block" id="delete_book">
                    <form action="delete_book.php" method="post">
                        <div class="line">Czy na pewno chcesz usunąć daną książkę?</div> 
                        <div class="buttons"><button type="button" onclick="Cancel_delete_book()">nie</button><form action="delete_book.php" method="post"><input type="hidden" name="delete_picked" value="$_POST[delete_picked]"><button type="submit">tak</button></form></div> 
                    </form>
                </div>
            PICKED;
        }
            if (isset($_POST['change_picked'])){
                echo <<<PICKED
                <div class="middle_block" id="change_book">
                    <form action="change_book.php" method="post">
                    <input type="hidden" name="change_picked" value="$_POST[change_picked]">
                    <div class="up">
                PICKED;
                        require_once 'connect.php';
                            $sql = "SELECT * FROM `books` WHERE `book_id`=$_POST[change_picked]";
                            $result = $connect->query($sql);
                            $book = $result->fetch_assoc();
                        echo <<<PICKED2
                        <div class="left">
                            <div class=input_line>
                                tytuł
                                <input type="text" name="title" value="$book[title]">
                            </div>
                            <div class=input_line>
                                autor
                                <input type="text" name="author" value="$book[author]">
                            </div>
                            <div class=input_line>
                                gatunek
                                <input type="text" name="genre" value="$book[genre]">
                            </div>
                            <div class=input_line>
                                rok wydania
                                <input type="text" name="year" value="$book[year]">
                            </div>
                            <div class=input_line>
                                obraz
                                <input type="text" name="picture" value="$book[picture]">
                            </div>
                            <div class=input_line>
                                status
                                <input type="text" name="status" value="$book[status]">
                            </div>
                        </div>
                        <div class="right">
                            <div class=input_line>
                                opis
                                <textarea name="description" id="set_desc" cols="30" rows="10" >$book[description]</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="buttons">
                        <button type="button" onclick="Cancel_pick_book()">anuluj</button> <button type="submit">potwierdź</button>
                    </div>
                </form>   
                </div>
                PICKED2;
            }
        ?>
    </div>
</div>

</body>
</html>
