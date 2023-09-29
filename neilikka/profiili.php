<?php
include "sivuosat/top.php";
$title = $traCommon['profile'][$lang];
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
$loggedIn = secure_page(1);
include "sivuosat/header.php";
?>

<main>
    <section>
        <p><a href="salasana-uusi.php">Uusi salasana</a></p>
        <?php
        if ($loggedIn > 2) { ?>
            <p><a href="kayttajat.php">Käyttäjät</a></p>
        <?php } ?>
    </section>
</main>

<?php include "sivuosat/footer.php"; ?>