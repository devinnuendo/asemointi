<?php
$title = 'Kirjaudu sisään';
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
include "sivuosat/header.php"; ?>

<main>
    <section>
        <form method="post" action="kirjaudu-kasittely.php">
            <legend class="scr">Kirjaudu sisään</legend>

            <label for="email">Sähköpostiosoite</label>
            <input type="email" name="email" id="email" placeholder="Sähköpostiosoite" autocomplete="email" required />

            <label for="password">Salasana</label>
            <input type="password" name="password" id="password" placeholder="Salasana" autocomplete="current-password" required minlength="10" />

            <input type="submit" value="Lähetä">
        </form>
    </section>
</main>

<?php include "sivuosat/footer.php"; ?>