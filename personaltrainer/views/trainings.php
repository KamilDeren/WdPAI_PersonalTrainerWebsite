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
        <li><a href="index">Strona Główna</a></li>
        <li><a href="contact">Kontakt</a></li>
        <li><a href="about">O mnie</a></li>
        <li><a href="offer">Oferta</a></li>
    </ul>
</section>

<section id="Trainings">
    <table>
        <tr>
            <th>Tytuł</th>
            <th>Poziom</th>
            <th>Godzina</th>
            <th>Gdzie</th>
            <th>Trener</th>
        </tr>
        <?php foreach($trainings as $training): ?>
            <tr>
                <td><?= $training->getTitle() ?></td>
                <td><?= $training->getLevel() ?></td>
                <td><?= $training->getDate() ?></td>
                <td><?= $training->getRoom() ?></td>
                <td><?= $training->getRunby() ?></td>
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