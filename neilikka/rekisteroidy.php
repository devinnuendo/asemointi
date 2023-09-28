<?php
include "sivuosat/top.php";
$title = $traCommon['register'][$lang];
$script = 'lomake.js';
$css = 'styles-lomake.css';
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
$loggedIn ? header("Location: index.php") : NULL;
include "sivuosat/header.php";
?>

<main class="rekisteroidy">
    <section>

        <?php include "sivuosat/form_language.php" ?>

        <form autocomplete="on" method="post" action="rekisteroidy-kasittely.php" id="registration-form">
            <legend class="scr">
                <?= $traCommon['register'][$lang]; ?>
            </legend>
            <label for="first_name">
                <?= $traCommon['name_first'][$lang]; ?>
            </label>
            <input type="text" name="first_name" id="first_name" placeholder="<?= $traCommon['name_first'][$lang]; ?>" autocomplete="given-name" minlength="2" required />
            <div class="error"></div>

            <label for="last_name">
                <?= $traCommon['name_last'][$lang]; ?>
            </label>
            <input type="text" name="last_name" id="last_name" placeholder="<?= $traCommon['name_last'][$lang]; ?>" autocomplete="family-name" minlength="2" required />
            <div class="error"></div>

            <label for="phone">
                <?= $traCommon['phone'][$lang]; ?>
            </label>
            <input type="tel" name="phone" id="phone" placeholder="<?= $traCommon['phone'][$lang]; ?>" autocomplete="tel" minlength="7" maxlength="15" pattern="^[0-9 ]{7,15}$" required />
            <div class="error"></div>

            <label for="email">
                <?= $traCommon['email_address'][$lang]; ?>
            </label>
            <input type="email" name="email" id="email" placeholder="<?= $traCommon['email_address'][$lang]; ?>" autocomplete="email" minlength="5" required />
            <div class="error"></div>

            <?php
            if (isset($_GET['message'])) {
                $message = urldecode($_GET['message']);
                echo "<div class='error block' aria-role='alert'>$message</div>";
            } ?>

            <label for="password">
                <?= $traCommon['password_wanted'][$lang]; ?>
            </label>
            <input type="password" name="password" id="password" placeholder="<?= $traCommon['password_wanted'][$lang]; ?>" autocomplete="new-password" minlength="10" required />
            <div class="error"></div>

            <label for="password2">
                <?= $traCommon['password_again'][$lang]; ?>
            </label>
            <input type="password" name="password2" id="password2" placeholder="<?= $traCommon['password_again'][$lang]; ?>" autocomplete="new-password" minlength="10" required />
            <div class="error"></div>
            <div class="error password-match" aria-role="alert"></div>

            <fieldset>
                <legend>
                    <?= $traCommon['newsletter_order'][$lang]; ?>
                </legend>
                <input type="radio" name="newsletter" id="newsletter_yes" value="Kylla" checked />
                <label for="newsletter_yes">
                    <?= $traCommon['yes'][$lang]; ?>
                </label>
                <input type="radio" name="newsletter" id="newsletter_no" value="Ei" />
                <label for="newsletter_no">
                    <?= $traCommon['no'][$lang]; ?>
                </label>
            </fieldset>

            <div>
                <input type="checkbox" name="terms" id="terms" value="ok" required />
                <label for="terms" class="inline-block">
                    <?= $traCommon['terms_accept'][$lang]; ?>
                </label>
                <div class="error"></div>
            </div>

            <button type="submit">
                <?= $traCommon['submit'][$lang]; ?>
            </button>
        </form>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>