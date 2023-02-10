<?php session_start(); ?>

<!DOCTYPE html>
<html lang="english">
<head>
    <title>Oferta</title>
    <script src="https://kit.fontawesome.com/5dc99e0e66.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="personaltrainer/css/style.css"/>
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

<section id="OfferContent">
    <div>
        <h2>Nasza Oferta</h2>
        <h4>PIERWSZY TRENING ZAPOZNAWCZY ZA DARMO!</h4>
        <p>Oferujemy:</p>
        <p>
            Ciągłą motywację
            <br> Indywidualne podejście
            <br> Korekcję wzorca ruchowego
            <br> Ukierunkowanie treningu pod dany cel i konkretną dyscyplinę sportową
        </p>
        <p>Cena zależna od ilości treningów w wybranym pakiecie</p>
    </div>

    <button><a href="register">Zapisz się już teraz</a></button>
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