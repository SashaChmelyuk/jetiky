<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title class="lang" key="persn-sign-in">JetIKy - Авторизація</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/style for account/styles.css">
    <script>window.onload = function () {document.body.classList.add('loaded');}</script>
    <link rel="icon" href="pictures/logo.png" type="image/x-icon">
</head>

<body>
    <div class="preloader">
  <div class="preloader__row">
    <div class="preloader__item"></div>
    <div class="preloader__item"></div>
  </div>
</div>

    <?php
        require_once("header.php");
    ?>

<!-- Блок для показу повідомлень -->
<div class="block_for_messages">
    <?php
 
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
 
            //Забираємо щоб не появилось заново при оновленні сторінки
            unset($_SESSION["error_messages"]);
        }
 
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
             
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>
 
<?php
    //Перевіряємо, якщо користувач не авторизований, то виводимо форму авторизації, 
    //інакше виводимо повідомлення про те, що він уже авторизований
    if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
?>
 
 
    <div id="form_auth">
    <section class="overlay">
        <h2 class="lang" key="sign-in">Авторизація</h2>
        <form action="auth.php" method="post" name="form_auth">
            <table>
          
                <tbody><tr>
                    <td> Email: </td>
                    <td>
                        <input type="email" name="email" required="required"><br>
                        <span id="valid_email_message" class="mesage_error"></span>
                    </td>
                </tr>
          
                <tr>
                    <td class="lang" key="password"> Пароль: </td>
                    <td>
                        <input type="password" name="password" placeholder="minimum 6 characters" required="required"><br>
                        <span id="valid_password_message" class="mesage_error"></span>
                    </td>
                </tr>
                 
                <tr>
                    <td class="lang" key="enter-captcha"> Введіть капчу: </td>
                    <td>
                        <p>
                            <img src="captcha.php"  class="captcha" alt="Img captcha" /> <br>
                            <input type="text" name="captcha" class="c_a" placeholder="captcha">
                        </p>
                    </td>
                </tr>
 
                <tr>
                    <td colspan="2">
                        <button type="submit" class="submit lang" key="sign-in1" name="btn_submit_auth">Увійти</button>
                    </td>
                </tr>
            </tbody></table>
        </form>
        <div class="create-ac">
            <h4 class="lang" key="none-ac?">Немає аккаунту? - </h4><div class="registation"><a href="form_register.php" class="lang" key="sign-up2">Зареєструватися</a></div>
        </div>
    </section>
    </div>
 
<?php
    }else{
?>
 
    <div id="authorized">
        <h2 class="lang" key="you-sign-in">Ви вже авторизовані</h2>
    </div>
 
<?php
    }
?>

<footer class="f-auth">
  <p>JetIKy &copy; 2022</p>
</footer>
        </body>
    </html>
