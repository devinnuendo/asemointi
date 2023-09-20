<?php
$title = 'Rekisteröidy';
$script = 'lomake.js';
$css = 'styles-lomake.css';
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
include "sivuosat/header.php";
include "db/db-azure.php";

// $errors = [
//     'first_name' => [
//         'puuttuu' => "Etunimi puuttuu",
//         'lyhyt' => "Etunimi on liian lyhyt",
//         'oikein' => "Anna etunimi oikein"
//     ],
//     'last_name' => [
//         'puuttuu' => "Sukunimi puuttuu",
//         'lyhyt' => "Sukunimi on liian lyhyt",
//         'oikein' => "Anna sukunimi oikein"
//     ],
//     'email' => [
//         'puuttuu' => "Sähköpostiosoite puuttuu",
//         'oikein' => "Anna sähköpostiosoite oikein"
//     ],
//     'password' => [
//         'puuttuu' => "Salasana puuttuu",
//         'lyhyt' => "Salasana on liian lyhyt",
//         'tasmaa' => "Salasanat eivät täsmää"
//     ],
//     'password2' => [
//         'puuttuu' => "Salasana puuttuu",
//         'lyhyt' => "Salasana on liian lyhyt",
//         'tasmaa' => "Salasanat eivät täsmää"
//     ],
//     'terms' => [
//         'puuttuu' => "Hyväksy käyttösäännöt"
//     ]
// ];

// function error($field)
// {
//     return $GLOBALS['errors'][$field] ?? $GLOBALS['errors'][$field]['puuttuu'];
// }
?>

<main class="rekisteroidy">
    <section>

        <form method="post" action="rekisteroidy-kasittely.php" id="registration-form">
            <legend class="scr">Rekisteröidy</legend>
            <label for="first_name">Etunimi</label>
            <input type="text" name="first_name" id="first_name" placeholder="Etunimi" autocomplete="given-name" minlength="2" required />
            <div class="error"></div>

            <label for="last_name">Sukunimi</label>
            <input type="text" name="last_name" id="last_name" placeholder="Sukunimi" autocomplete="family-name" minlength="2" required />
            <div class="error"></div>

            <label for="phone">Puhelinnumero</label>
            <input type="tel" name="phone" id="phone" placeholder="Puhelinnnumero" autocomplete="tel" minlength="7" maxlength="15" pattern="^[0-9 ]{7,15}$" required />
            <div class="error"></div>

            <label for="email">Sähköpostiosoite</label>
            <input type="email" name="email" id="email" placeholder="Sähköpostiosoite" autocomplete="email" minlength="5" required />
            <div class="error"></div>
            <?php
            if (isset($_GET['message'])) {
                $message = urldecode($_GET['message']);
                echo "<div class='error' aria-role='alert'>$message</div>";
            } ?>

            <label for="password">Haluamasi salasana</label>
            <input type="password" name="password" id="password" placeholder="Salasana" autocomplete="new-password" minlength="10" required />
            <div class="error"></div>

            <label for="password2">Anna salasana uudelleen</label>
            <input type="password" name="password2" id="password2" placeholder="Salasana uudelleen" autocomplete="new-password" minlength="10" required />
            <div class="error"></div>
            <div class="error password-match" aria-role="alert"></div>

            <fieldset>
                <legend>Haluan tilata uutiskirjeen</legend>
                <input type="radio" name="newsletter" id="newsletter_yes" value="Kylla" checked />
                <label for="newsletter_yes">Kyllä</label>
                <input type="radio" name="newsletter" id="newsletter_no" value="Ei" />
                <label for="newsletter_no">Ei</label>
            </fieldset>

            <div>
                <input type="checkbox" name="terms" id="terms" value="ok" required />
                <label for="terms" class="inline-block">Olen lukenut ja hyväksyn sivuston käyttösäännöt</label>
                <div class="error"></div>
            </div>

            <input type="submit" value="Lähetä">
        </form>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>