<?php session_start(); ?>

<!DOCTYPE html>
<html lang="english">
<head>
    <title>Moje konto</title>
    <script src="https://kit.fontawesome.com/5dc99e0e66.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="personaltrainer/css/style.css"/>
    <script type="text/javascript" src="personaltrainer/js/changeaccountdetails.js" defer></script>
    <script type="text/javascript" src="personaltrainer/js/script.js" defer></script>

</head>
<body>

<section class="header">
    <div class="logo">
        <div class="login">
            <i class="fa-regular fa-user"></i>
            <?php if (empty($_SESSION['id'])) { ?>
                <button><a href="login">Log In</a></button>
            <?php } ?>

            <?php if (!empty($_SESSION['id'])) { ?>
                <button><a href="myaccount">Moje konto</a></button>
                <button><a href="logout">Wyloguj się</a></button>
            <?php } ?>
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

<section id="Content">
    <div class="myacc">
        <div class='myacc-row'>
            <h2>Twoje dane</h2>
        </div>
        <div class='myacc-row'>
            <div class='myacc-column'>
                <div class='myacc-column-left'>
                    <input type="text" id="name" name="name" placeholder="<?= $myaccount->getName() ?>" disabled>
                    <input type="text" id="name" name="name" placeholder="<?= $myaccount->getSurname() ?>" disabled>
                    <input type="text" id="name" name="name" placeholder="<?= $myaccount->getEmail() ?>" disabled>
                    <input type="text" id="name" name="name" placeholder="<?= $myaccount->getPhoneNumber() ?>" disabled>
                    <input type="text" id="name" name="name" placeholder="<?= $myaccount->getSex() ?>" disabled>
                </div>
            </div>
            <div class='myacc-column'>
                <div class='myacc-column-right'>
                    <img src="" alt="brak">
                    <button>Dodaj/zmień zdjęcie</button>
                </div>
            </div>
        </div>
        <div class='myacc-row'>
            <div class='myacc-column'>
                <div class='myacc-column-right'>
                    <button id="changeData">Zmień swoje dane</button>
                </div>
            </div>
            <div class='myacc-column'>
                <div class='myacc-column-right'>
                    <button id="changePassword">Zmień hasło</button>
                </div>
            </div>
        </div>
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
