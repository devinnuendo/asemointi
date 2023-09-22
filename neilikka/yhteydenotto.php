<?php
$title = 'Ota yhteyttä';
$css = 'styles-lomake.css';
$script = 'lomake.js';
$img640 = 'flower-3231083_640.jpg';
$img1280 = 'flower-3231083_1280.jpg';
$img1920 = 'flower-3231083_1920.jpg';
include "sivuosat/header.php";



?>

<main class="yhteydenotto">
    <section class="lista-wrap">
        <div>
            <label for="yhteydenottolista">Voit ottaa meihin yhteyttä</label>
            <ul id="yhteydenottolista">
                <li>puhelimitse yksittäisiin myymälöihin
                    <ul>
                        <li>Helsinki: <a href="tel:xx-xxxxxxx">xx-xxxxxxx</a></li>
                        <li>Espoo: <a href="tel:xx-xxxxxxx">xx-xxxxxxx</a></li>
                    </ul>
                </li>
                <li>sähköpostitse: <a href="mailto:asiakaspalvelu@puutarhaliikeneilikka.fi">asiakaspalvelu@puutarhaliikeneilikka.fi</a>
                    <ul>
                        <li>Helsingin myymälä: <a href="mailto:helsinki@puutarhaliikeneilikka.fi">helsinki@puutarhaliikeneilikka.fi</a>
                        </li>
                        <li>Espoon myymälä: <a href="mailto:espoo@puutarhaliikeneilikka.fi">espoo@puutarhaliikeneilikka.fi</a>
                        </li>
                    </ul>
                </li>
                <li>alla olevalla lomakkeella</li>
            </ul>
        </div>

        <?php include "sivuosat/form_language.php" ?>

        <form action="yhteydenotto-kasittely.php" id="form-yhteydenotto" method="POST">
            <label for="name"><?= $tra['name']; ?></label>
            <input type="text" id="name" name="nimi" autocomplete="name" minlength="2" maxlength="255" placeholder="<?= $tra['name']; ?>" required>
            <div class="error"></div>

            <label for="email"><?= $tra['email']; ?></label>
            <input type="email" id="email" name="sahkoposti" autocomplete="email" minlength="5" placeholder="<?= $tra['email']; ?>" required>
            <div class="error"></div>
            <?php
            if (isset($_GET['message'])) {
                $message = urldecode($_GET['message']);
                echo "<div class='error' aria-role='alert'>$message</div>";
            } ?>

            <label for="phone"><?= $tra['phone']; ?> <small>(<?= $tra['optional']; ?>)</small></label>
            <input type="tel" name="phone" id="phone" placeholder="<?= $tra['phone']; ?>" autocomplete="tel" minlength="7" maxlength="15" pattern="^[0-9 ]{7,15}$" />
            <div class="error"></div>

            <label for="subject"><?= $tra['message_subject']; ?></label>
            <select id="subject" name="aihe" required>
                <option value=""><?= $tra['subject_choose']; ?></option>
                <option value="kysymys"><?= $tra['subject_question']; ?></option>
                <option value="tilaus"><?= $tra['subject_order']; ?></option>
                <option value="yhteydenotto"><?= $tra['subject_contact']; ?></option>
                <option value="muu"><?= $tra['subject_other']; ?></option>
            </select>
            <div class="error"></div>

            <label for="message"><?= $tra['message']; ?></label>
            <textarea id="message" name="viesti" rows="4" cols="50" minlength="10" placeholder="<?= $tra['message']; ?>" maxlength="255" required></textarea>
            <div class="error"></div>

            <fieldset>
                <legend><?= $tra['newsletter_order']; ?></legend>
                <input type="radio" id="kylla" name="uutiskirje" value="Kylla" checked>
                <label for="kylla"><?= $tra['yes']; ?></label>
                <input type="radio" id="ei" name="uutiskirje" value="Ei">
                <label for="ei"><?= $tra['no']; ?></label>

            </fieldset>

            <button type="submit"><?= $tra['submit']; ?></button>
        </form>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>