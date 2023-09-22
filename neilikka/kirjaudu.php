<?php
$title = 'Kirjaudu sisään';
$script = 'lomake.js';
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
            <div class="error"></div>

            <label for="password">Salasana</label>
            <input type="password" name="password" id="password" placeholder="Salasana" autocomplete="current-password" required minlength="10" />
            <div class="error"></div>
            <?php
            if (isset($_GET['message'])) {
                $message = urldecode($_GET['message']);
                echo "<div class='error' aria-role='alert'>$message</div>";
            } ?>
            <button type="submit">Lähetä</button>
        </form>
    </section>
</main>

<?php include "sivuosat/footer.php"; ?>