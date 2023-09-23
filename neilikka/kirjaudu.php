<?php
include "sivuosat/top.php";
$title = $tra['login'][$lang];
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
            <legend class="scr"><?= $tra['login'][$lang]; ?></legend>

            <label for="email"><?= $tra['email'][$lang]; ?></label>
            <input type="email" name="email" id="email" placeholder="<?= $tra['email'][$lang]; ?>" autocomplete="email" required />
            <div class="error"></div>

            <label for="password"><?= $tra['password'][$lang]; ?></label>
            <input type="password" name="password" id="password" placeholder="<?= $tra['password'][$lang]; ?>" autocomplete="current-password" required minlength="10" />
            <div class="error"></div>
            <?php
            if (isset($_GET['message'])) {
                $message = urldecode($_GET['message']);
                echo "<div class='error' aria-role='alert'>$message</div>";
            } ?>
            <button type="submit"><?= $tra['submit'][$lang]; ?></button>
        </form>
    </section>
</main>

<?php include "sivuosat/footer.php"; ?>