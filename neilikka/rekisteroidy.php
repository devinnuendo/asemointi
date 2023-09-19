<?php
$title = 'Rekisteröidy';
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
include "sivuosat/header.php";
include "db/db-azure.php";
?>

<main class="rekisteroidy">
    <section>

        <form method="post" action="rekisteroidy-kasittely.php">
            <legend class="scr">Rekisteröidy</legend>
            <label for="first_name">Etunimi</label>
            <input type="text" name="first_name" id="first_name" placeholder="Etunimi" autocomplete="given-name" required />

            <label for="last_name">Sukunimi</label>
            <input type="text" name="last_name" id="last_name" placeholder="Sukunimi" autocomplete="family-name" required />

            <label for="email">Sähköpostiosoite</label>
            <input type="email" name="email" id="email" placeholder="Sähköpostiosoite" autocomplete="email" required />

            <label for="password">Haluamasi salasana</label>
            <input type="password" name="password" id="password" placeholder="Salasana" autocomplete="new-password" required minlength="10" />


            <fieldset>
                <legend>Haluan tilata uutiskirjeen</legend>
                <input type="radio" name="newsletter" id="newsletter_yes" value="Kylla" />
                <label for="newsletter_yes">Kyllä</label>
                <input type="radio" name="newsletter" id="newsletter_no" value="Ei" />
                <label for="newsletter_no">Ei</label>
            </fieldset>

            <input type="checkbox" name="delivery_terms" id="ok" value="ok" required />
            <label for="ok" class="inline-block">Olen lukenut ja hyväksyn tuotteiden toimitusehdot</label>

            <input type="submit" value="Lähetä">
        </form>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>