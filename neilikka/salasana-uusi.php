<?php
include "sivuosat/top.php";
$title = $traCommon['new'][$lang] . " " . strtolower($traCommon['password'][$lang]);
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
$script = 'lomake.js';
$css = 'styles-lomake.css';
include "sivuosat/header.php";
include "salasana-uusi-kasittely.php"
?>

<main>
    <section>

        <form method="post">
            <label for="email"><?= $traCommon['email'][$lang] ?></label>
            <input type="email" name="email" id="email" required>
            <div class="error"></div>
            <button type="submit"> <?= $traCommon['submit'][$lang] ?> </button>
        </form>

        <div class="notification <?= isset($message_type) ? $message_type : '' ?>">
            <div>
                <?php
                if (isset($sent_message)) {
                    echo $sent_message;
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php include "sivuosat/footer.php"; ?>