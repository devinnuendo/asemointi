<?php
$title = 'Perus-PHP';
$slug = str_replace(' ', '-', strtolower($title));
$css = 'styles-perusphp.css';
?>

<?php include "head.php"; ?>

<?php
?>
<main class="<?php echo $slug ?>">
    <section>
        <h2><a href="https://moodle.omnia.fi/mod/page/view.php?id=564056">Tehtäviä: Muuttujat ja kontrollirakenteet</a></h2>
        <section>
            <header>
                <h3>Tehtävä 1</h3>
            </header>
            <?php
            echo "Hei maailma!";
            ?>
        </section>
        <section>
            <header>
                <h3>Tehtävä 2: Ohjelmointikielet</h3>
            </header>
            <?php
            echo "<ul>";

            $php = "PHP";
            $java = "Java";
            $perl = "Perl";
            $jscript = "Javascript";

            echo "<li>$php</li>";
            echo "<li>$java</li>";
            echo "<li>$perl</li>";
            echo "<li>$jscript</li>";
            echo "</ul>";
            ?>

        </section>
        <section>
            <header>
                <h3>Tehtävä 3</h3>
            </header>
            <?php

            $luku1 = 1;
            $luku2 = 2;

            echo "<p>$luku1 + $luku2 = " . ($luku1 + $luku2) . "</p>";
            echo "<p>$luku1 - $luku2 = " . ($luku1 - $luku2) . "</p>";
            echo "<p>$luku1 * $luku2 = " . ($luku1 * $luku2) . "</p>";

            if ($luku2 != 0) {
                echo "<p>$luku1 / $luku2 = " . ($luku1 / $luku2) . "</p>";
                echo "<p>$luku1 % $luku2 = " . ($luku1 % $luku2) . "</p>";
            } else {
                echo "<p>Luku 2 ei voi olla nolla jakolaskussa tai modulo-operaatiossa.</p>";
            }
            ?>
        </section>
        <section>
            <header>
                <h3>Tehtävä 4</h3>
            </header>
            <?php

            $luku = 8;
            echo "<p>Arvo on nyt $luku.<p>";

            $luku += 2;
            echo "<p>Lisää 2. Arvo on nyt $luku.<p>";

            $luku -= 4;
            echo "<p>Vähennä 4. Arvo on nyt $luku.<p>";

            $luku *= 5;
            echo "<p>Kerro 5:llä. Arvo on nyt $luku.<p>";

            $luku /= 3;
            echo "<p>Jaa 3:lla. Arvo on nyt $luku.<p>";

            $luku++;
            echo "<p>Inkrementoi (lisää) arvoa yhdellä. Arvo on nyt $luku.<p>";

            $luku--;
            echo "<p>Dekrementoi (vähennä) arvoa yhdellä. Arvo on nyt $luku.<p>";
            ?>
        </section>
        <section>
            <header>
                <h3>Tehtävä 5</h3>
            </header>
            <?php
            $luku = rand(1, 10);
            echo "<p>Arvottu luku: $luku</p>";

            if ($luku <= 5) {
                echo "<p>Pieni!</p>";
            } else {
                echo "<p>Suuri!</p>";
            }
            ?>
        </section>

        <section>
            <header>
                <h3>Tehtävä 6</h3>
            </header>
            <?php
            $arvosana = rand(1, 3);

            if ($arvosana == 3) {
                echo "<p>Kiitettävä</p>";
            } elseif ($arvosana == 2) {
                echo "<p>Hyvä</p>";
            } else {
                echo "<p>Tyydyttävä</p>";
            }
            ?>
        </section>

        <section>
            <header>
                <h3>Tehtävä 7</h3>
            </header>
            <?php
            $i = 0;
            while ($i < 5) {
                echo "<p>Oma nimi</p>";
                $i++;
            }
            ?>
        </section>

        <section>
            <header>
                <h3>Tehtävä 8</h3>
            </header>
            <?php
            $kertotaulu = 10;

            for ($i = 1; $i <= 12; $i++) {
                $tulos = $i * $kertotaulu;
                echo "<p>$i * $kertotaulu = $tulos</p>";
            }
            ?>
        </section>

        <section>
            <header>
                <h3>Tehtävä 9</h3>
            </header>
            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo $i;
                if ($i < 10) {
                    echo "-";
                }
            }
            ?>
        </section>

        <section>
            <header>
                <h3>Tehtävä 10</h3>
            </header>
            <?php
            $n = 4;
            $kertoma = 1;

            for ($i = 1; $i <= $n; $i++) {
                $kertoma *= $i;
            }

            echo "<p>$n kertoma on $kertoma</p>";
            ?>
        </section>
        <section>
            <header>
                <h3>Tehtävä 11</h3>
            </header>
            <?php
            echo "<table>";
            echo "<tbody>";

            for ($i = 1; $i <= 10; $i++) {
                echo "<tr>";

                for ($j = 1; $j <= 10; $j++) {
                    $tulos = $i * $j;
                    echo "<td>$tulos</td>";
                }

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            ?>
        </section>
    </section>
    <section>
        <h2><a href="https://moodle.omnia.fi/mod/page/view.php?id=564057">Tehtäviä: Funktiot</a></h2>

        <section>
            <header>
                <h3>Tehtävä 1: CSS-tyylit</h3>
            </header>
            <?php
            function tulostaTyylit()
            {
                echo '<style>';
                echo '.valkoinen {background-color: white; width: 30px; height: 30px;}';
                echo '.musta {background-color: black; width: 30px; height: 30px;}';
                echo '</style>';
            }
            echo "<pre>Lisää head-osioon: 
    if (function_exists('tulostaTyylit')) {
       tulostaTyylit();
    };
            </pre>";
            ?>
        </section>

        <section>
            <header>
                <h3>Tehtävä 2: Tervehdys</h3>
            </header>
            <?php
            function tervehdi($nimi)
            {
                echo "Hei, $nimi!";
            }
            $nimi = "Matti";
            tervehdi($nimi); // Kutsutaan funktiota ja tulostetaan tervehdys
            ?>
        </section>

        <section>
            <header>
                <h3>Tehtävä 3: Kertolasku</h3>
            </header>
            <?php
            function kerto($luku1, $luku2)
            {
                $tulos = $luku1 * $luku2;
                return $tulos;
            }
            $luku1 = 5;
            $luku2 = 7;
            $tulos = kerto($luku1, $luku2); // Kutsutaan funktiota ja tallennetaan tulos muuttujaan
            echo "Tulos: $tulos";
            ?>
        </section>

        <section>
            <header>
                <h3>Tehtävä 4: Potenssi</h3>
            </header>
            <?php
            function potenssi($kantaluku, $eksponentti)
            {
                $tulos = 1;
                for ($i = 1; $i <= $eksponentti; $i++) {
                    $tulos *= $kantaluku;
                }
                return $tulos;
            }
            $kantaluku = 2;
            $eksponentti = 3;
            $potenssi = potenssi($kantaluku, $eksponentti); // Kutsutaan funktiota ja tallennetaan tulos muuttujaan
            echo "$kantaluku^$eksponentti = $potenssi";
            ?>
        </section>

        <section>
            <header>
                <h3>Tehtävä 5: Shakkilauta</h3>
            </header>
            <?php
            function shakkilauta()
            {
                echo '<table border="1">';
                for ($rivi = 0; $rivi < 8; $rivi++) {
                    echo '<tr>';
                    for ($sarake = 0; $sarake < 8; $sarake++) {
                        // Vaihtoehtoisesti voit käyttää ($rivi + $sarake) % 2 == 0 ehtoa parillisille valkoisille soluille.
                        if (($rivi % 2 == 0 && $sarake % 2 == 0) || ($rivi % 2 != 0 && $sarake % 2 != 0)) {
                            echo '<td class="valkoinen"></td>';
                        } else {
                            echo '<td class="musta"></td>';
                        }
                    }
                    echo '</tr>';
                }
                echo '</table>';
            }
            shakkilauta(); // Kutsutaan funktiota ja tulostetaan shakkilauta
            ?>
        </section>
    </section>

    <section>

        <h2><a href="https://moodle.omnia.fi/mod/page/view.php?id=564058">Tehtäviä: Taulukot</a></h2>

        <section>
            <header>
                <h3>Tehtävä 1: Ostoslista</h3>
            </header>
            <?php
            $ostoslista = ["maitoa", "leipää", "jauhelihaa", "riisi"];
            $ostoslista[] = "omenoita";
            sort($ostoslista);
            echo '<ul>';
            foreach ($ostoslista as $tuote) {
                echo '<li>' . $tuote . '</li>';
            }
            echo '</ul>';
            ?>
        </section>

        <section>
            <header>
                <h3>Tehtävä 2: Sekoitettu taulukko</h3>
            </header>
            <?php
            $taulukko = range(1, 100); // Luo taulukko luvuilla 1-100
            shuffle($taulukko);
            $viisiEnsimmäistä = array_slice($taulukko, 0, 5); // Otetaan viisi ensimmäistä alkiota
            echo '<ul>';
            foreach ($viisiEnsimmäistä as $alkio) {
                echo '<li>' . $alkio . '</li>';
            }
            echo '</ul>';
            ?>
        </section>

        <section>
            <header>
                <h3>Tehtävä 3: Pääkaupungit</h3>
            </header>
            <?php
            $paakaupungit = array(
                "Italia" => "Rooma",
                "Tanska" => "Kööpenhamina",
                "Suomi" => "Helsinki",
                // Lisää muut maat ja pääkaupungit tähän
            );
            ksort($paakaupungit); // Järjestetään aakkosjärjestykseen
            foreach ($paakaupungit as $maa => $paakaupunki) {
                echo $maa . ': ' . $paakaupunki . '<br>';
            }
            ?>
        </section>

        <section>
            <header>
                <h3>Tehtävä 4: Summa taulukosta</h3>
            </header>
            <?php
            function summaTaulukosta($taulukko)
            {
                return array_sum($taulukko);
            }

            $taulukko1 = [1, 2, 3, 4, 5];
            $taulukko2 = [10, 20, 30];

            echo 'Summa taulukosta 1: ' . summaTaulukosta($taulukko1) . '<br>';
            echo 'Summa taulukosta 2: ' . summaTaulukosta($taulukko2) . '<br>';
            ?>
        </section>

        <section>
            <header>
                <h3>Tehtävä 5: Arvo taulukossa</h3>
            </header>
            <?php
            function arvoTaulukossa($taulukko, $arvo)
            {
                foreach ($taulukko as $alkio) {
                    if ($alkio === $arvo) {
                        return true;
                    }
                }
                return false;
            }

            $taulukko = [1, 2, 3, 4, 5];
            $etsittavaArvo = 3;

            if (arvoTaulukossa($taulukko, $etsittavaArvo)) {
                echo 'Arvo ' . $etsittavaArvo . ' löytyy taulukosta.';
            } else {
                echo 'Arvoa ' . $etsittavaArvo . ' ei löydy taulukosta.';
            }
            ?>
        </section>

    </section>

    <section>

        <h2><a href="https://moodle.omnia.fi/mod/page/view.php?id=564059">Tehtäviä: Sivuparametrit</a></h2>

        <section>
            <header>
                <h3>Tehtävä 1: Nettiteknologia</h3>
            </header>
            <?php
            if (!isset($_GET['tekno'])) {
                echo '<a href="nettiteknologia.php?tekno=html">HTML</a><br>';
                echo '<a href="nettiteknologia.php?tekno=css">CSS</a><br>';
                echo '<a href="nettiteknologia.php?tekno=javascript">Javascript</a><br>';
                echo '<a href="nettiteknologia.php?tekno=php">PHP</a><br>';
            } elseif ($_GET['tekno'] == 'html') {
                echo 'HTML kuvaa dokumentin rakenteen.';
            } elseif ($_GET['tekno'] == 'css') {
                echo 'CSS määrittää dokumentin ulkoasun.';
            } elseif ($_GET['tekno'] == 'javascript') {
                echo 'Javascript on selainpuolen kieli.';
            } elseif ($_GET['tekno'] == 'php') {
                echo 'PHP on palvelinpuolen kieli.';
            } else {
                echo 'Haluamaasi teknologiaa ei löydy.';
            }
            ?>
        </section>

        <section>
            <header>
                <h3>Tehtävä 2: Rekisteröitymislomake</h3>
            </header>
            <form action="perus-lomakkeenkasittelija.php" method="POST">
                Nimi*: <input type="text" name="nimi" required><br>
                Sähköposti*: <input type="email" name="sahkoposti" required><br>
                Salasana*: <input type="password" name="salasana" required><br>
                Sukupuoli:
                <input type="radio" name="sukupuoli" value="mies"> Mies
                <input type="radio" name="sukupuoli" value="nainen"> Nainen
                <input type="radio" name="sukupuoli" value="muu"> Muu<br>
                Maakunta:
                <select name="maakunta">
                    <option value="Uusimaa">Uusimaa</option>
                    <option value="Varsinais-Suomi">Varsinais-Suomi</option>
                    <!-- Lisää muut maakunnat tähän -->
                </select><br>
                Lemmikit:
                <input type="checkbox" name="lemmikit[]" value="koira"> Koira
                <input type="checkbox" name="lemmikit[]" value="kissa"> Kissa
                <input type="checkbox" name="lemmikit[]" value="matelija"> Matelija
                <input type="checkbox" name="lemmikit[]" value="jyrsija"> Jyrsijä
                <input type="checkbox" name="lemmikit[]" value="kala"> Kala
                <input type="checkbox" name="lemmikit[]" value="muu"> Muu<br>
                Kuvaus: <textarea name="kuvaus"></textarea><br>
                <input type="submit" value="Rekisteröidy">
            </form>
        </section>

        <section>
            <header>
                <h3>Tehtävä 3: Piilokenttä</h3>
            </header>
            <form action="perus-lomakkeenkasittelija.php" method="POST">
                <!-- Lisätään piilokenttä "osasto" -->
                <input type="hidden" name="osasto" value="Espoo">
                Nimi*: <input type="text" name="nimi" required><br>
                Sähköposti*: <input type="email" name="sahkoposti" required><br>
                Salasana*: <input type="password" name="salasana" required><br>
                <!-- Muut kentät kuten edellisessä lomakkeessa -->
                <input type="submit" value="Rekisteröidy">
            </form>
        </section>
    </section>

    <section>

        <h2><a href="https://moodle.omnia.fi/mod/page/view.php?id=564060">Tehtäviä: Sessiot</a></h2>

        <a href="sessio.php">Tehtävä</a>


    </section>

</main>

<?php include "footer.php"; ?>