<?php
include "sivuosat/top.php";
$title = $traCommon['login'][$lang];
$script = 'lomake.js';
$css = 'styles-lomake.css';
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
include "sivuosat/header.php"; ?>

<main>
    <section>

        <?php include "sivuosat/form_language.php" ?>

        <form method="post" action="kirjaudu-kasittely.php">
            <legend class="scr"><?= $traCommon['login'][$lang]; ?></legend>

            <label for="email"><?= $traCommon['email_address'][$lang]; ?></label>
            <input type="email" name="email" id="email" placeholder="<?= $traCommon['email_address'][$lang]; ?>" autocomplete="email" required />
            <div class="error"></div>

            <label for="password"><?= $traCommon['password'][$lang]; ?></label>
            <input type="password" name="password" id="password" placeholder="<?= $traCommon['password'][$lang]; ?>" autocomplete="current-password" required minlength="10" />
            <div class="error"></div>
            <?php
            if (isset($_GET['message'])) {
                $message = urldecode($_GET['message']);
                echo "<div class='error' aria-role='alert'>$message</div>";
            } ?>
            <button type="submit"><?= $traCommon['submit'][$lang]; ?></button>
        </form>
    </section>
</main>

<?php include "sivuosat/footer.php"; ?>