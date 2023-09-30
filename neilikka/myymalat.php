<?php
include "sivuosat/top.php";
$title = $traCommon['stores'][$lang];
$img640 = 'market-1178251_640.jpg';
$img1280 = 'market-1178251_1280.jpg';
include "sivuosat/header.php"; ?>

<main>
    <section>
        <article>
            <figure>
                <img src="img/photos/market-1178251_640.jpg" alt="ruusuja" />
                <figcaption class="scr"></figcaption>
            </figure>
            <div>
                Puutarhaliike Neilikka, <?= $traCommon['Helsinki'][$lang]; ?> <br />
                Fabianinkatu 42 <br />
                00100 <?= $traCommon['Helsinki'][$lang]; ?> <br />
                <?= $traCommon['phone_abbr'][$lang]; ?> <a href="tel:xx-xxxxxxx">xx-xxxxxxx</a> <br />
                <?= $traCommon['email'][$lang]; ?>: <a href="mailto:helsinki@puutarhaliikeneilikka.fi">helsinki@puutarhaliikeneilikka.fi</a>

                <p>
                    <?= $traCommon['open_hours'][$lang]; ?><br />
                    <?= $traLocal['open_hours_hki'][$lang]; ?>
                </p>
            </div>
        </article>
    </section>
    <section>
        <article>
            <figure>
                <img src="img/photos/flower-1696533_640.jpg" alt="ruusuja" />
                <figcaption class="scr"></figcaption>
            </figure>
            <div>
                Puutarhaliike Neilikka, <?= $traCommon['Espoo'][$lang]; ?> <br />
                Kivenlahdentie 10 <br />
                01234 <?= $traCommon['Espoo'][$lang]; ?> <br />
                <?= $traCommon['phone_abbr'][$lang]; ?> <a href="tel:xx-xxxxxxx">xx-xxxxxxx</a> <br />
                <?= $traCommon['email'][$lang]; ?>: <a href="mailto:espoo@puutarhaliikeneilikka.fi">espoo@puutarhaliikeneilikka.fi</a>

                <p><?= $traCommon['open_hours'][$lang]; ?><br />
                    <?= $traLocal['open_hours_espoo'][$lang]; ?>
                </p>
            </div>
        </article>
    </section>
</main>

<?php include "sivuosat/footer.php"; ?>