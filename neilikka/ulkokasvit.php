<?php
include "sivuosat/top.php";
$title = $traLocal['plants_outdoor'][$lang];
include "sivuosat/header.php"; ?>

<main>
    <?php include "sivuosat/inner-nav.php"; ?>
    <section class="kauppa">
        <ul>
            <li>
                <a href="#">
                    <figure>
                        <img src="img/orange-tree-2485387_640.jpg" alt="appelsiinipuu" />
                        <figcaption>
                            <em><?= $traLocal['tree_orange'][$lang] ?></em>
                            <strong>20 &euro;</strong>
                        </figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="#">
                    <figure>
                        <img src="img/sunflowers-2437482_640.jpg" alt="auringonkukkia" />
                        <figcaption>
                            <em><?= $traLocal['flower_sunflower'][$lang] ?></em>
                            <strong>5 &euro;</strong>
                        </figcaption>
                    </figure>
                </a>
            </li>

        </ul>
    </section>
</main>

<?php include "sivuosat/footer.php"; ?>