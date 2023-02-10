<?php session_start(); ?>

<!DOCTYPE html>
<html lang="english">
<head>
    <title>O mnie</title>
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
    <div class="myacc-row">
        <div class="myacc-column">
            <h2>O mnie</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam varius pellentesque nisl, vel auctor
                sapien
                lobortis ac. Pellentesque ultrices est id ipsum volutpat, nec feugiat metus dignissim. Maecenas mollis
                lacus
                id justo bibendum lobortis. Sed nec mattis nibh. Vestibulum vitae est in felis aliquet imperdiet ac eget
                dolor. In laoreet enim ut lorem cursus, id fringilla justo malesuada. Maecenas blandit dignissim mattis.
                Ut
                id ex eu eros mattis iaculis eget vel ante. Nulla convallis nibh augue, vitae feugiat ipsum hendrerit
                ac.
                Suspendisse fermentum sem sit amet justo ullamcorper, eget pharetra ex pharetra. In condimentum libero
                quis
                ligula cursus, vitae lobortis sem fermentum. Class aptent taciti sociosqu ad litora torquent per conubia
                nostra, per inceptos himenaeos. Duis scelerisque, mi nec lacinia faucibus, dolor risus fringilla nisl,
                ut
                volutpat elit nibh hendrerit dui. Duis et placerat mi, a semper elit. Aenean a nisl sollicitudin,
                eleifend
                sapien nec, sodales metus. Nam fermentum vitae metus eget tempus. Aliquam ut accumsan ligula, sit amet
                laoreet quam. Ut porttitor turpis tempor suscipit vulputate. Cras vehicula quis elit a pulvinar. Morbi
                suscipit nec nulla tempus efficitur. Quisque in ullamcorper ex. Ut tincidunt rhoncus enim a mattis.
                Etiam
                pretium sem facilisis, venenatis ex in, fermentum est.</p></div>

    </div>
    <div class="myacc-row">
        <img src="/personaltrainer/img/aboutimg.svg">
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
