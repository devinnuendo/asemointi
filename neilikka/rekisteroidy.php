<?php
$title = 'Rekisteröidy';
$script = 'lomake.js';
$css = 'styles-lomake.css';
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
include "sivuosat/header.php";
include "db/db-azure.php";
?>

<main class="rekisteroidy">
    <section>

        <form method="post" action="rekisteroidy-kasittely.php" id="registration-form">
            <legend class="scr">Rekisteröidy</legend>
            <label for="first_name">Etunimi</label>
            <input type="text" name="first_name" id="first_name" placeholder="Etunimi" autocomplete="given-name" minlength="2" required />
            <div class="error view">Lisää etunimi</div>

            <label for="last_name">Sukunimi</label>
            <input type="text" name="last_name" id="last_name" placeholder="Sukunimi" autocomplete="family-name" minlength="2" required />
            <div class="error">Lisää sukunimi</div>

            <label for="email">Sähköpostiosoite</label>
            <input type="email" name="email" id="email" placeholder="Sähköpostiosoite" autocomplete="email" minlength="5" required />
            <div class="error view">Lisää sähköpostiosoite</div>

            <label for="password">Haluamasi salasana</label>
            <input type="password" name="password" id="password" placeholder="Salasana" autocomplete="new-password" minlength="10" required />
            <div class="error view">Lisää salasana</div>

            <label for="password2">Anna salasana uudelleen</label>
            <input type="password" name="password2" id="password2" placeholder="Salasana uudelleen" autocomplete="new-password" minlength="10" required />
            <div class="error view">Lisää salasana</div>
            <div class="error password-match" aria-role="alert">Salasanat eivät täsmää</div>

            <fieldset>
                <legend>Haluan tilata uutiskirjeen</legend>
                <input type="radio" name="newsletter" id="newsletter_yes" value="Kylla" checked />
                <label for="newsletter_yes">Kyllä</label>
                <input type="radio" name="newsletter" id="newsletter_no" value="Ei" />
                <label for="newsletter_no">Ei</label>
            </fieldset>

            <input type="checkbox" name="terms" id="ok" value="ok" required />
            <label for="ok" class="inline-block">Olen lukenut ja hyväksyn sivuston käyttösäännöt</label>
            <div class="error view">Hyväksy käyttösäännöt</div>

            <input type="submit" value="Lähetä">
        </form>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>