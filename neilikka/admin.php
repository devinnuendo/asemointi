<?php
include "sivuosat/top.php";
$title = 'Admin';
$loggedIn = secure_page(4);
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
include "sivuosat/header.php"; ?>

<main>
    <section>
        <p><a href="kasvi-lisaa.php">Lisää kasvi</a></p>
        <p><a href="kayttajat.php">Käyttäjät</a></p>
        <p><a href="kayttajat.php">Käyttäjähallinta</a></p>
    </section>
</main>

<?php include "sivuosat/footer.php"; ?>