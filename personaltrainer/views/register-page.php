<?php session_start(); ?>

<!DOCTYPE html>
<html lang="english">
<head>
    <title>Rejestracja</title>
    <script src="https://kit.fontawesome.com/5dc99e0e66.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="personaltrainer/css/style.css"/>
    <script type="text/javascript" src="personaltrainer/js/script.js" defer></script>
</head>
<body>

<section class="header">
    <div class="logo">
        <div class="login">
            <i class="fa-regular fa-user"></i>
            <button><a href="login">Log In</a></button>
        </div>
    </div>
</section>

<section id="NavBar">
    <?php if (empty($_SESSION['id'])) { ?>
    <ul id="regular"> <?php } ?>
        <?php if (!empty($_SESSION['id']) and (int)$_SESSION['id'] !== 1) { ?>
        <ul id="afterLoginNav1"> <?php } ?>
            <?php if (!empty($_SESSION['id']) and (int)$_SESSION['id'] == 1) { ?>
            <ul id="afterLoginNav2"><?php } ?>

                <li><a href="index">Strona Główna</a></li>
                <li><a href="contact">Kontakt</a></li>
                <li><a href="about">O mnie</a></li>
                <li><a href="offer">Oferta</a></li>
                <?php if (!empty($_SESSION['id'])) { ?>
                    <li><a href="trainings">Treningi</a></li>
                <?php } ?>
                <?php if (!empty($_SESSION['id']) and (int)$_SESSION['id'] == 1) { ?>
                    <li><a href="trainings">Dodaj trening</a></li>
                <?php } ?>
            </ul>
</section>

<section id="LoginContener">
    <h2>Uzupełnij pola aby się zarejestrować</h2>
    <div>
        <form id="registerPanel" action="register" method="POST">
            <!--<div class="messages">
                <?php
            if (isset($messages)) {
                foreach ($messages as $message) {
                    echo $message;
                }
            }
            ?>
            </div>-->
            <label for="name" class="item1">Imie</label>
            <input type="text" id="name" name="name" class="input1">

            <label for="surname" class="item2">Nazwisko</label>
            <input type="text" id="surname" name="surname" class="input2">

            <label for="email" class="item3">Email</label>
            <input type="text" id="email" name="email" class="input3">

            <label for="password" class="item7">Hasło</label>
            <input type="text" id="password" name="password" class="input7">

            <label for="rpassword" class="item8">Powtórz hasło</label>
            <input type="text" id="rpassword" name="rpassword" class="input8">

            <label for="city" class="item4">Miasto</label>
            <input type="text" id="city" name="city" class="input4">

            <label for="phone_number" class="item5">Nr telefonu</label>
            <input type="text" id="phone_number" name="phone_number" class="input5">

            <label for="sex" class="item6">Płeć</label>
            <input type="text" id="sex" name="sex" class="input6">
        </form>
        <button id="submit" type="submit" form="registerPanel"><b>Zarejestruj się</b></button>
    </div>
</section>

<section id="FooterBar">
    <div class="Dane">
        <p>Dane Kontaktowe</p>
        <p>Numer telefonu: 123456789</p>
        <p>Email: sample@gmail.com</p>
    </div>

    <div class="Media">
        <p>Media Społecznościowe</p>
        <i class="fa-brands fa-instagram"></i> <a href="">instagram.in</a> </br>
        <i class="fa-brands fa-facebook"></i> <a href="">facebook.fb </a></br>
        <i class="fa-brands fa-youtube"></i> <a href="">youtube.yt</a> </br>
        <i class="fa-brands fa-twitch"></i> <a href="">twitch.tv</a> </br>
    </div>
</section>

</body>
</html>