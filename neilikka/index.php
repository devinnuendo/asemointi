<?php
include "sivuosat/top.php";
$title = 'Puutarhaliike Neilikka';
include "sivuosat/header.php"; ?>

<main class="etusivu">
    <section>
        <?= $traLocal['home_intro'][$lang]; ?>
    </section>
    <section>
        <h2><?= $traCommon['news'][$lang];  ?></h2>
        <a href="#" class="wrap">
            <article>
                <figure>
                    <img src="img/rose-4191686_640.jpg" alt="ruusuja" />
                    <figcaption class="scr"></figcaption>
                </figure>
                <div>
                    <h3><em>Hyvää uutta vuotta!</em></h3>
                    <small>2.1.2016</small>
                    <p>Uuden vuoden kunniaksi myymälöissämme upeita tarjouksia.</p>
                </div>
            </article>
        </a>
        <a href="#" class="wrap">
            <article>
                <figure>
                    <img src="img/flower-1829711_640.png" alt="joulukukkia" />
                    <figcaption class="scr"></figcaption>
                </figure>
                <div>
                    <h3><em>Joulukukat edullisesti meiltä</em></h3>
                    <small>14.12.2015</small>
                    <p>Myymälöissämme myös kattava ja edullinen valikoima joulukuusia.</p>
                </div>
            </article>
        </a>
        <a href="#" class="wrap">
            <article>
                <figure>
                    <img src="img/woman-4792038_640.jpg" alt="nainen kukkien kanssa" />
                    <figcaption class="scr"></figcaption>
                </figure>
                <div>
                    <h3><em>Nyt on hyvä aika aloittaa puutarhan valmistelu talven lepokautta varten</em></h3>
                    <small>1.9.2015</small>
                    <p>Meiltä löydät kaikki työkalut ja tarvikkeet.</p>
                </div>
            </article>
        </a>
    </section>
</main>

<?php include "sivuosat/footer.php"; ?>