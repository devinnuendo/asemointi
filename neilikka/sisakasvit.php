<?php
include "sivuosat/top.php";
$title = $traLocal['plants_indoor'][$lang];
include "sivuosat/header.php"; ?>

<main>
    <?php include "sivuosat/inner-nav.php"; ?>
    <section class="kauppa">
        <ul>
            <li>
                <a href="#">
                    <figure>
                        <img src="img/roses-6887974_640.jpg" alt="punaisia ruusuja" />
                        <figcaption>
                            <em><?= $traLocal['flower_rose'][$lang] ?>, <?= strtolower($traCommon['color_red'][$lang]) ?></em>
                            <small><?= $traLocal['plants_cut'][$lang] ?>, 70-80 cm, 1 <?= $traCommon['pieces'][$lang] ?></small>
                            <strong>10 &euro;</strong>
                        </figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="#">
                    <figure>
                        <img src="img/rose-3337091_640.jpg" alt="valkoisia ruusuja" />
                        <figcaption>
                            <em><?= $traLocal['flower_rose'][$lang] ?>, <?= strtolower($traCommon['color_white'][$lang]) ?></em>
                            <small><?= $traLocal['plants_cut'][$lang] ?>, 70-80 cm, 1 <?= $traCommon['pieces'][$lang] ?></small>
                            <strong>10 &euro;</strong>
                        </figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="#">
                    <figure>
                        <img src="img/carnation-1325012_640.jpg" alt="neilikka" />
                        <figcaption>
                            <em><?= $traLocal['flower_carnation'][$lang] ?>, <?= strtolower($traCommon['color_pink'][$lang]) ?></em>
                            <small><?= $traLocal['plants_cut'][$lang] ?>, 64 cm, 3 <?= $traCommon['pieces'][$lang] ?></small>
                            <strong>8,90 &euro;</strong>
                        </figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="#">
                    <figure>
                        <img src="img/bunch-of-flowers-1018557_640.jpg" alt="kesäinen kukkakimppu" />
                        <figcaption>
                            <em><?= $traLocal['like_summer'][$lang] ?> &ndash; <?= $traLocal['flower_bunch'][$lang] ?></em>
                            <small><?= $traLocal['flower_bunch'][$lang] ?>, <?= $traCommon['color_yellow'][$lang] ?> <?= strtolower($traLocal['flower_rose'][$lang]) ?></small>
                            <strong>50 &euro;</strong>
                        </figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="#">
                    <figure>
                        <img src="img/bunch-of-flowers-3116227_640.jpg" alt="juhlava kukkakimppu" />
                        <figcaption>
                            <em><?= $traLocal['like_elegant'][$lang] ?> &ndash; <?= $traLocal['flower_bunch'][$lang] ?></em>
                            <small><?= $traLocal['flower_rose'][$lang] ?>, <?= strtolower($traCommon['color_pink'][$lang]) ?></small>
                            <strong>60 &euro;</strong>
                        </figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="#">
                    <figure>
                        <img src="img/hyacinth-1230667_640.jpg" alt="hyasintti" />
                        <figcaption>
                            <em><?= $traLocal['flower_hyasinth'][$lang] ?></em>
                            <small><?= $traLocal['plants_pot'][$lang] ?></small>
                            <strong>5,90 &euro;</strong>
                        </figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="#">
                    <figure>
                        <img src="img/gerbera-955803_640.jpg" alt="gerbera" />
                        <figcaption>
                            <em>Gerbera</em>
                            <small><?= $traLocal['plants_pot'][$lang] ?></small>
                            <strong>6.90 &euro;</strong>
                        </figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="#">
                    <figure>
                        <img src="img/flower-1829711_640.png" alt="joulutähti" />
                        <figcaption>
                            <em><?= $traLocal['flower_poinsettia'][$lang] ?></em>
                            <small><?= $traLocal['plants_pot'][$lang] ?></small>
                            <strong>10 &euro;</strong>
                        </figcaption>
                    </figure>
                </a>
            </li>

        </ul>
    </section>
</main>

<?php include "sivuosat/footer.php"; ?>