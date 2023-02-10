<?php session_start(); ?>

<!DOCTYPE html>
<html lang="english">
<head>
    <title>Treningi</title>
    <script src="https://kit.fontawesome.com/5dc99e0e66.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="personaltrainer/css/style.css"/>
    <script type="text/javascript" src="personaltrainer/js/search.js" defer></script>
    <script type="text/javascript" src="personaltrainer/js/trainingManagement.js" defer></script>
</head>
<body>

<section class="header">
    <div class="logo">
        <h2>Tutaj bedzie logo jakies moze czy cos</h2>
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
    <?php if (empty($_SESSION['id'])) { ?> <ul id="regular"> <?php } ?>
        <?php if (!empty($_SESSION['id']) and (int)$_SESSION['id']!==1) { ?> <ul id="afterLoginNav1"> <?php } ?>
            <?php if (!empty($_SESSION['id']) and (int)$_SESSION['id']==1) { ?> <ul id="afterLoginNav2"><?php } ?>

                <li><a href="index">Strona Główna</a></li>
                <li><a href="contact">Kontakt</a></li>
                <li><a href="about">O mnie</a></li>
                <li><a href="offer">Oferta</a></li>
                <?php if (!empty($_SESSION['id'])) { ?>
                    <li><a href="trainings">Treningi</a></li>
                <?php } ?>
                <?php if (!empty($_SESSION['id']) and (int)$_SESSION['id']==1) { ?>
                    <li><a href="addtraining">Dodaj trening</a></li>
                <?php } ?>
            </ul>
</section>

<section id="Trainings">
    <div class="search-bar">
        <input placeholder="Wyszukaj trening">
    </div>
    <h2>Treningi w następnym tygodniu
        od <?php echo date("Y-m-d", time()) . ' do ' . date("Y-m-d", time() + 604800) ?></h2>
    <table class="selector">
        <tr>
            <th>Tytuł</th>
            <th>Poziom</th>
            <th>Godzina</th>
            <th>Gdzie</th>
            <th>Trener</th>
            <th>Zapisz się!</th>
        </tr>
        <?php foreach ($trainings as $training): ?>
            <tr>
                <td><?= $training->getTitle() ?></td>
                <td><?= $training->getLevel() ?></td>
                <td><?= $training->getDate() ?></td>
                <td><?= $training->getRoom() ?></td>
                <td><?= $training->getRunby() ?></td>
                <td><button id="signUpWithdrawButton" value="dodaj"><i class="fa-solid fa-plus" id="<?= $training->getIdTraining() ?>"></i></button></td>
            </tr>
        <?php endforeach; ?>
    </table>

</section>

<section id="FooterBar">
    <div class="Dane">
        <p>Dane Kontaktowe</p>
        <p>Numer telefonu: 123456789</p>
        <p>Email: sample@gmail.com</p>
    </div>

    <div class="Media">
        <p>Media Społecznościowe</p>
        <i class="fa-brands fa-instagram"></i> instagram.in </br>
        <i class="fa-brands fa-facebook"></i> facebook.fb </br>
        <i class="fa-brands fa-youtube"></i> youtube.yt </br>
        <i class="fa-brands fa-twitch"></i> twitch.tv </br>
    </div>
</section>

</body>
</html>

<template id="training-template">
    <tr>
        <td>Title</td>
        <td>Level</td>
        <td>Date</td>
        <td>Room</td>
        <td>Run by</td>
        <td><button>Zapisz</button></td>
    </tr>
</template>