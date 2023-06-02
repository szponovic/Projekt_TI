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
            <div class="line">+ dodaj nowego użytkownika</div> 
        </div>

        <div class="middle_block" id="remove">
            <div class="line">Czy na pewno chcesz usunąć danego użytkownika?</div> 
            <div class="buttons"><button>nie</button><button>tak</button></div> 
        </div>

        <div class="middle_block" id="user_info">
            <div class="info">
                <div class="line">James Adams</div> 
                <div class="line">addamss22@gmail.com</div> 
                <div class="line">Zwykły użytkownik</div> 
            </div>
            <div class="buttons">
                <div class="line"><button>podgląd historii</button></div>
                <div class="line"><button>zmień rolę</button></div>
                <div class="line"><button>usuń</button></div>
            </div>
        </div>

        <div class="middle_block" id="choose_role">
            <div class="line">Wybierz rolę:</div>
            <div class="line">
                <div class="role_radios">
                    <div class="radio"><label><input type="radio" name="food" checked> zwykły użytkownik</label></div>
                    <div class="radio"><label><input type="radio" name="food"> bibliotekarz</label></div>
                    <div class="radio"><label><input type="radio" name="food"> administrator</label></div>
                </div>
            </div>
            <div class="buttons">
                <button>anuluj</button><button>potwierdź</button>
            </div>
        </div>

        <div class="middle_block" id="new_user">
            <div class=input_line>
                imię
                <input type="text">
            </div>
            <div class=input_line>
                nazwisko
                <input type="text">
            </div>
            <div class=input_line>
                login
                <input type="text">
            </div>
            <div class=input_line>
                hasło
                <input type="text">
            </div>
            <div class="line"><br>Wybierz rolę:</div>
            <div class="line">
                <div class="role_radios">
                    <div class="radio"><label><input type="radio" name="food" checked> zwykły użytkownik</label></div>
                    <div class="radio"><label><input type="radio" name="food"> bibliotekarz</label></div>
                    <div class="radio"><label><input type="radio" name="food"> administrator</label></div>
                </div>
            </div>
            <div class="buttons">
                <button>anuluj</button><button>potwierdź</button>
            </div>
        </div>

    </div>
</div>

</body>
</html>
