<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php include('connect.php');


    if (isset($_GET['book_id'])) {
        $bookId = $_GET['book_id'];
        $sql = "SELECT * FROM books WHERE book_id = $bookId";
        $result = $connect->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_row();

        } else {
            echo "No book found with the specified ID.";
        }
    } else {
        echo "No book ID specified in the URL.";
    }
    ?>
    <div class="nav_container">
        <li><a class="" href="">Wyloguj</a></li>
        <li><a href="">Spis ksiazek</a></li>

    </div><br>


    <div class="main_container">
        <div class="mid_container">

            <div class="middle_block" id="user_info">
                <div class="line"><b>Tytuł:
                        <?php echo $row[1]; ?>
                    </b>
                    <?php ?> <b>Autor:</b>
                    <?php echo $row[2]; ?>
                </div>

            </div>

            <div class="left_block" id="user_info">
                <div class="info">
                    <div class="line"><b>Opis ksiażki</b></div>
                    <div class="line">
                        <?php echo $row[5]; ?>
                    </div>

                </div>
                <div class="line">
                    <img src="./img/sherlock.jpg" alt="Sherlock">
                </div>
            </div><br>
            <div class="middle_block" id="choose_role">
                <div class="line"><b>Co chcesz zrobić?</b></div>
                <div class="line">
                    <div class="buttons">
                        <button>Anuluj</button>
                        <button>Wypozycz</button>
                        <button>Oddaje</button>
                    </div>
                </div>

            </div>



        </div>
    </div>

</body>

</html>
