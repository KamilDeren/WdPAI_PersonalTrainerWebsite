<?php session_start(); ?>

<!DOCTYPE html>
<html lang="english">
<head>
  <title>Trening</title>
  <script src="https://kit.fontawesome.com/5dc99e0e66.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8" />
  <link rel="stylesheet" href="personaltrainer/css/style.css" />
</head>
<body>

<section class="header">
    <div class="logo">
        <h2>Tutaj bedzie logo jakies moze czy cos</h2>
        <div class="login">
            <i class="fa-regular fa-user"></i>
            <button><a href="myaccount">Moje konto</a></button>
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
                    <li><a href="trainings">Dodaj trening</a></li>
                <?php } ?>
            </ul>
</section>

<section id="LoginContener">
  <h2>Dodaj nowy trening!</h2>
  <div class="loginDiv">
    <form action="addTraining" method="POST" id="loginPanel">
        <label for="title">Tytuł:</label>
        <input type="text" id="title" name="title">
        <label for="level">Poziom:</label>
        <select name="level" id="level">
            <option value="Beginner">Początkujący</option>
            <option value="Intermediate">Średnio Zaawansowany</option>
            <option value="Advanced">Zaawansowany</option>
            <option value="Expert">Ekspert</option>
        </select>
        <label for="date">Data:</label>
        <input type="datetime-local" id="date" name="date">
        <label for="room">Pomieszczenie:</label>
        <input type="room" id="room" name="room">
        <label for="run_by">Prowadzone przez:</label>
        <input type="run_by" id="run_by" name="run_by">
        <input id="submit" type="submit" value="Dodaj zajęcia">
    </form>
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
        <i class="fa-brands fa-instagram"></i> instagram.in </br>
        <i class="fa-brands fa-facebook"></i> facebook.fb </br>
        <i class="fa-brands fa-youtube"></i> youtube.yt </br>
        <i class="fa-brands fa-twitch"></i> twitch.tv </br>
    </div>
</section>

</body>
</html>