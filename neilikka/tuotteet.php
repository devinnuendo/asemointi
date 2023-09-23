<?php
include "sivuosat/top.php";
$title = $traCommon['products'][$lang];;
$img640 = 'flower-3231099_640.jpg';
$img1280 = 'flower-3231099_1280.jpg';
$img1920 = 'flower-3231099_1920.jpg';
include "sivuosat/header.php"; ?>

<main>
    <section class="tuotteet">
        <p class="full"><?= $traLocal['products_intro'][$lang]; ?></p>
        <nav>
            <figure>
                <a href="sisakasvit.php" class="iconset"><img src="img/potted_plant.png" alt="kasvi ruukussa -kuvake" /> </a>
                <figcaption>
                    <a href="sisakasvit.php">
                        <?= $traLocal['plants_indoor'][$lang]; ?>
                    </a>
                    <a class="scr" href="https://www.flaticon.com/free-icons/farming-and-gardening" title="farming and gardening icons">Farming and gardening icons created by Vitaly Gorbachev - Flaticon</a>
                </figcaption>
            </figure>

            <figure>
                <a href="ulkokasvit.php" class="iconset"><img src="img/plant.png" alt="kasvi maassa -kuvake" /></a>
                <figcaption>
                    <a href="ulkokasvit.php">
                        <?= $traLocal['plants_outdoor'][$lang]; ?>
                    </a>
                    <a class="scr" href="https://www.flaticon.com/free-icons/plant" title="plant icons">Plant icons created by Smashicons - Flaticon</a>
                </figcaption>
            </figure>

            <figure>
                <a href="tyokaluja.php" class="iconset"><img src="img/shovel-and-rake.png" alt="työkaluja -kuvake" /> </a>
                <figcaption>
                    <a href="tyokaluja.php">
                        <?= $traCommon['tools'][$lang]; ?>
                    </a><a class="scr" href="https://www.flaticon.com/free-icons/agriculture" title="agriculture icons">Agriculture icons created by Freepik - Flaticon</a>
                </figcaption>
            </figure>

            <figure>
                <a href="kasvien-hoito.php" class="iconset"><img src="img/holding-hand.png" alt="kasvia pidellään kädessä -kuvake" /></a>
                <figcaption>
                    <a href="kasvien-hoito.php">
                        <?= $traLocal['plants_care'][$lang]; ?>
                    </a>
                    <a class="scr" href="https://www.flaticon.com/free-icons/environment" title="environment icons">Environment icons created by tulpahn - Flaticon</a>
                </figcaption>
            </figure>
        </nav>
    </section>
</main>

<?php include "sivuosat/footer.php"; ?>