<?php
include "sivuosat/top.php";
$title = $traCommon['contact_us'][$lang];
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
            <label for="yhteydenottolista"><?= $traLocal['contact_intro'][$lang]; ?></label>
            <ul id="yhteydenottolista">
                <li><?= $traLocal['contact_intro_phone'][$lang]; ?>
                    <ul>
                        <li><?= $traCommon['Helsinki'][$lang]; ?>: <a href="tel:xx-xxxxxxx">xx-xxxxxxx</a></li>
                        <li><?= $traCommon['Espoo'][$lang]; ?>: <a href="tel:xx-xxxxxxx">xx-xxxxxxx</a></li>
                    </ul>
                </li>
                <li><?= $traLocal['contact_intro_email'][$lang]; ?>: <a href="mailto:asiakaspalvelu@puutarhaliikeneilikka.fi">asiakaspalvelu@puutarhaliikeneilikka.fi</a>
                    <ul>
                        <li><?= $traCommon['Helsinki'][$lang]; ?>: <a href="mailto:helsinki@puutarhaliikeneilikka.fi">helsinki@puutarhaliikeneilikka.fi</a>
                        </li>
                        <li><?= $traCommon['Espoo'][$lang]; ?>: <a href="mailto:espoo@puutarhaliikeneilikka.fi">espoo@puutarhaliikeneilikka.fi</a>
                        </li>
                    </ul>
                </li>
                <li><?= $traLocal['contact_intro_form'][$lang]; ?></li>
            </ul>
        </div>

        <?php include "sivuosat/form_language.php" ?>

        <form action="yhteydenotto-kasittely.php" id="form-yhteydenotto" method="POST">
            <label for="name"><?= $traCommon['name'][$lang]; ?></label>
            <input type="text" id="name" name="nimi" autocomplete="name" minlength="2" maxlength="255" placeholder="<?= $traCommon['name'][$lang]; ?>" required>
            <div class="error"></div>

            <label for="email"><?= $traCommon['email_address'][$lang]; ?></label>
            <input type="email" id="email" name="sahkoposti" autocomplete="email" minlength="5" placeholder="<?= $traCommon['email_address'][$lang]; ?>" required>
            <div class="error"></div>
            <?php
            if (isset($_GET['message'])) {
                $message = urldecode($_GET['message']);
                echo "<div class='error' aria-role='alert'>$message</div>";
            } ?>

            <label for="phone"><?= $traCommon['phone'][$lang]; ?> <small>(<?= $traCommon['optional'][$lang]; ?>)</small></label>
            <input type="tel" name="phone" id="phone" placeholder="<?= $traCommon['phone'][$lang]; ?>" autocomplete="tel" minlength="7" maxlength="15" pattern="^[0-9 ]{7,15}$" />
            <div class="error"></div>

            <label for="subject"><?= $traCommon['message_subject'][$lang]; ?></label>
            <select id="subject" name="aihe" required>
                <option value=""><?= $traCommon['subject_choose'][$lang]; ?></option>
                <option value="kysymys"><?= $traCommon['subject_question'][$lang]; ?></option>
                <option value="tilaus"><?= $traCommon['subject_order'][$lang]; ?></option>
                <option value="yhteydenotto"><?= $traCommon['subject_contact'][$lang]; ?></option>
                <option value="muu"><?= $traCommon['subject_other'][$lang]; ?></option>
            </select>
            <div class="error"></div>

            <label for="message"><?= $traCommon['message'][$lang]; ?></label>
            <textarea id="message" name="viesti" rows="4" cols="50" minlength="10" placeholder="<?= $traCommon['message'][$lang]; ?>" maxlength="255" required></textarea>
            <div class="error"></div>

            <fieldset>
                <legend><?= $traCommon['newsletter_order'][$lang]; ?></legend>
                <input type="radio" id="kylla" name="uutiskirje" value="Kylla" checked>
                <label for="kylla"><?= $traCommon['yes'][$lang]; ?></label>
                <input type="radio" id="ei" name="uutiskirje" value="Ei">
                <label for="ei"><?= $traCommon['no'][$lang]; ?></label>

            </fieldset>

            <button type="submit"><?= $traCommon['submit'][$lang]; ?></button>
        </form>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>