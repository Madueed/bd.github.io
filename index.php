<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://i.ibb.co/GP3dyzw/IMG-6199.jpg">
    <title>Frontend-кейс</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <div class="wrapper">

        <form class="form" method="POST" action="vendor/mail.php">
            <div class="form__inner">
                <h2>Вы приглашены?<br>
                    Подтвердите ваше участие
                </h2>
                <div class="form__content">
                    <h3>Ваше имя:</h3>
                    <p>
                        <input type="text" name="name" autocomplete="off" maxlength="50" required>
                    </p>
                    <h3>Ваш телефон:</h3>
                    <p>
                        <input type="tel" name="tel" autocomplete="off" maxlength="50" required>
                    </p>
                    <h3>Гостей:</h3>
                    <p>
                        <select name="guests">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </p>
                    <p>
                        <input type="submit" value="Я подтверждаю">
                    </p>
                    <?php 
                        if (isset($_SESSION['error'])) {
                            echo '<p class="form__error"> ' . $_SESSION['error'] . ' </p>';
                            unset($_SESSION['error']);
                        }

                        if (isset($_SESSION['message'])) {
                            echo '<p class="form__message"> ' . $_SESSION['message'] . ' </p>';
                            unset($_SESSION['message']);
                        }
                    ?>
                </div>
            </div>
        </form>

    </div>
   <!-- <footer style="font-family: Arial, Helvetica, sans-serif; text-align: center; padding: 10px 0;">
        Подключайся к нам в телеграмм <a target="_blank" href="https://t.me/frontend_case">@frontend_case</a>.
        Помощь новичкам!
        Будем развиваться во фронтенд разработке вместе :)
    </footer>
    -->
</body>
</html>