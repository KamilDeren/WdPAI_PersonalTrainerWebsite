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
  <ul>
    <li><a href="#home">Strona Główna</a></li>
    <li><a href="#contact">Kontakt</a></li>
    <li><a href="#about">O mnie</a></li>
    <li><a href="#offer-view">Oferta</a></li>
  </ul>
</section>

<section id="LoginContener">
  <h2>Zaloguj się na swoje konto!</h2>
  <div>
    <form class="panel" action="log" method="POST">
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
        <button id="submit" type="submit">Zaloguj się</button>
    </form>
    <button><a href="signup">Nie masz konta? Zarejestruj się!</a></button> <!-- można kod podmienić w JS zamiast osobnej strony -->
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
    <p>yt</p>
    <p>face</p>
    <p>Insta</p>
    <p>twitch</p>
  </div>
</section>

</body>
</html>