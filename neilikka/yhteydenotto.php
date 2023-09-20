<?php
$title = 'Ota yhteyttä';
$css = 'styles-lomake.css';
$script = 'lomake.js';
$img640 = 'flower-3231083_640.jpg';
$img1280 = 'flower-3231083_1280.jpg';
$img1920 = 'flower-3231083_1920.jpg';
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

        <form action="yhteydenotto-kasittely.php" method="POST">
            <label for="name">Nimi:</label>
            <input type="text" id="name" name="nimi" autocomplete="name" minlength="2" maxlength="255" required>
            <div class="error"></div>

            <label for="email">Sähköposti:</label>
            <input type="email" id="email" name="sahkoposti" autocomplete="email" minlength="5" required>
            <div class="error"></div>

            <label for="phone">Puhelinnumero <small>(valinnainen)</small></label>
            <input type="tel" name="phone" id="phone" placeholder="Puhelinnnumero" autocomplete="tel" minlength="7" maxlength="15" pattern="^[0-9 ]{7,15}$" />
            <div class="error"></div>

            <label for="subject">Aihe:</label>
            <select id="subject" name="aihe" required>
                <option value="">Valitse aihe</option>
                <option value="kysymys">Kysymys tuotteista</option>
                <option value="tilaus">Tilaus</option>
                <option value="yhteydenotto">Yhteydenottopyyntö</option>
                <option value="muu">Muu</option>
            </select>
            <div class="error"></div>

            <label for="message">Viesti:</label>
            <textarea id="message" name="viesti" rows="4" cols="50" minlength="10" maxlength="255" required></textarea>
            <div class="error"></div>

            <fieldset>
                <legend>Haluan tilata Puutarhaliike Neilikan uutiskirjeen:</legend>
                <input type="radio" id="kylla" name="uutiskirje" value="Kylla" checked>
                <label for="kylla">Kyllä</label>
                <input type="radio" id="ei" name="uutiskirje" value="Ei">
                <label for="ei">Ei</label>

            </fieldset>

            <input type="submit" value="Lähetä">
        </form>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>