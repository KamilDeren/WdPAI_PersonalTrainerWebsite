<?php
session_start();
?>

<!DOCTYPE html>
<html lang="english">
<head>
  <title>Treningi</title>
  <script src="https://kit.fontawesome.com/5dc99e0e66.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8" />
  <link rel="stylesheet" href="personaltrainer/css/style.css" />
</head>
<body>

<section class="header">
  <div class="logo">
    <h2>Tutaj bedzie logo jakies moze czy cos</h2>
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
  <h2>Zaloguj się na swoje konto!</h2>
  <div class="loginDiv">
    <form id="loginPanel" action="login" method="POST">
        <div class="messages">
            <?php
            if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
        <br><label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <label for="password">Hasło:</label>
        <input type="text" id="password" name="password">
        <input id="submit" type="submit" value="Zaloguj się">
    </form>
    <button><a href="register">Nie masz konta? Zarejestruj się!</a></button>
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