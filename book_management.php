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

<div class="main_container">
    <div class="mid_container">

        <div class="middle_block" id="add">
            <div class="line">+ dodaj nową książkę do bazy</div>
        </div>

        <div class="middle_block" id="remove">
            <div class="line">Czy na pewno chcesz usunąć daną książkę?</div> 
            <div class="buttons"><button>nie</button><button>tak</button></div> 
        </div>

        <div class="middle_block" id="change_book">
            <div class="up">
                <div class="left">
                    <div class=input_line>
                        tytuł
                        <input type="text">
                    </div>
                    <div class=input_line>
                        autor
                        <input type="text">
                    </div>
                    <div class=input_line>
                        gatunek
                        <input type="text">
                    </div>
                    <div class=input_line>
                        rok wydania
                        <input type="text">
                    </div>
                    <div class=input_line>
                        obraz
                        <input type="text">
                    </div>
                    <div class=input_line>
                        ilość
                        <input type="number" min="0">
                    </div>
                </div>
                <div class="right">
                    <div class=input_line>
                        opis
                        <textarea name="desc" id="set_desc" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="buttons">
                <button>anuluj</button><button>potwierdź</button>
            </div>
        </div>

        <div class="middle_block" id="book_info">
            <div class="up">
                <div class="left">
                    <div class="up">
                        <div class="picture">
                            <img src="./img/duma.png" alt="zdjęcie okładki">
                        </div>
                        <div class="basic_info">
                            <div class="line"> <b><i>Duma i uprzedzenie</i></b></div>
                            <div class="line">Jane Austin </div>
                            <div class="line">2005 </div>
                            <div class="line">dramat </div>
                        </div>
                    </div>
                    <div class="desc_phone">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    </div>
                </div>
                <div class="right">
                    <div class="quantity">
                        Ilość: 12
                    </div>
                    <div class="buttons">
                        <button>zmień dane</button>
                        <button>usuń</button>
                    </div>
                </div>
            </div>
            <div class="desc_pc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            </div>
        </div>
    </div>
</div>


</body>
</html>

