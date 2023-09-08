<?php
$title = 'Ota yhteyttä';
$img640 = 'img/flower-3231083_640.jpg';
$img1280 = 'img/flower-3231083_1280.jpg';
$img1920 = 'img/flower-3231083_1920.jpg';
include "sivuosat/header.php"; ?>

<main class="yhteydenotto">
    <section class="lista-wrap">
        <div>
            <label for="yhteydenottolista">Voit ottaa meihin yhteyttä</label>
            <ul id="yhteydenottolista">
                <li>puhelimitse yksittäisiin myymälöihin
                    <ul>
                        <li>Helsinki: <a href="tel:xx-xxxxxxx">xx-xxxxxxx</a></li>
                        <li>Espoo: <a href="tel:xx-xxxxxxx">xx-xxxxxxx</a></li>
                    </ul>
                </li>
                <li>sähköpostitse: <a href="mailto:asiakaspalvelu@puutarhaliikeneilikka.fi">asiakaspalvelu@puutarhaliikeneilikka.fi</a>
                    <ul>
                        <li>Helsingin myymälä: <a href="mailto:helsinki@puutarhaliikeneilikka.fi">helsinki@puutarhaliikeneilikka.fi</a>
                        </li>
                        <li>Espoon myymälä: <a href="mailto:espoo@puutarhaliikeneilikka.fi">espoo@puutarhaliikeneilikka.fi</a>
                        </li>
                    </ul>
                </li>
                <li>alla olevalla lomakkeella</li>
            </ul>
        </div>

        <form action="tallenna_tiedot.php" method="POST">
            <label for="nimi">Nimi:</label>
            <input type="text" id="nimi" name="nimi" required>

            <label for="sahkoposti">Sähköposti:</label>
            <input type="email" id="sahkoposti" name="sahkoposti" required>

            <label for="aihe">Aihe:</label>
            <select id="aihe" name="aihe" required>
                <option value="kysymys">Kysymys tuotteista</option>
                <option value="tilaus">Tilaus</option>
                <option value="yhteydenotto">Yhteydenottopyyntö</option>
                <option value="muu">Muu</option>
            </select>

            <label for="viesti">Viesti:</label>
            <textarea id="viesti" name="viesti" rows="4" cols="50" required></textarea>
            <fieldset>
                <legend><label for="uutiskirje">Haluan tilata Puutarhaliike Neilikan uutiskirjeen:</label></legend>
                <input type="radio" id="kylla" name="uutiskirje" value="kylla" checked>
                <label for="kylla">Kyllä</label>
                <input type="radio" id="ei" name="uutiskirje" value="ei">
                <label for="ei">Ei</label>

            </fieldset>

            <input type="submit" value="Lähetä">
        </form>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>