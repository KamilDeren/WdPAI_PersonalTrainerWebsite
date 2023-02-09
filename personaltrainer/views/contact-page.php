<?php session_start(); ?>

<!DOCTYPE html>
<html lang="english">
<head>
    <title>Kontakt</title>
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
                <?php if(empty($_SESSION['id'])){?>
                    <button><a href="login">Log In</a></button>
                <?php }?>

                <?php if(!empty($_SESSION['id'])){?>
                    <button><a href="myaccount">Moje konto</a></button>
                <?php }?>
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

<section id="OfferContent">
    <div>
        <h2>Skontaktuj się ze mną!</h2>
        <h4>Możesz mnie znaleźć na:</h4>
        <p>
            Instagram: <a href="#">link.in</a>
            <br> Youtube: <a href="#">link.yt</a>
            <br> Twitch: <a href="#">link.tw</a>
            <br> Facebook: <a href="#">link.fb</a>
        </p>
        <p>Oraz także poprzez maila: sample@gmail.com</p>
        <p>Telefon: 123456789</p>
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
