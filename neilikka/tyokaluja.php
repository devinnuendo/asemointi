<?php
include "sivuosat/top.php";
$title = $traCommon['tools'][$lang];
include "sivuosat/header.php"; ?>

<main>
    <?php include "sivuosat/inner-nav.php"; ?>
    <section class="kauppa">
        <p><?= $traCommon['products_soon'][$lang] ?></p>
    </section>
</main>

<?php include "sivuosat/footer.php"; ?>