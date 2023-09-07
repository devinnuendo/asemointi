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

        <div class="container mt-5">
            <form method="POST" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="nimi" class="form-label">Nimi:</label>
                    <input type="text" id="nimi" name="nimi" class="form-control" required>
                    <div class="invalid-feedback">Anna nimesi</div>
                </div>

                <div class="mb-3">
                    <label for="sahkoposti" class="form-label">Sähköposti:</label>
                    <input type="email" id="sahkoposti" name="sahkoposti" class="form-control" required>
                    <div class="invalid-feedback">Anna validi sähköpostiosoite</div>
                </div>

                <div class="mb-3">
                    <label for="aihe" class="form-label">Aihe:</label>
                    <select id="aihe" name="aihe" class="form-select" required>
                        <option value="kysymys">Kysymys tuotteista</option>
                        <option value="tilaus">Tilaus</option>
                        <option value="yhteydenotto">Yhteydenottopyyntö</option>
                        <option value="muu">Muu</option>
                    </select>
                    <div class="invalid-feedback">Valitse aihe</div>
                </div>

                <div class="mb-3">
                    <label for="viesti" class="form-label">Viesti:</label>
                    <textarea id="viesti" name="viesti" rows="4" cols="50" class="form-control" required></textarea>
                    <div class="invalid-feedback">Kirjoita viesti.</div>
                </div>

                <fieldset class="mb-3">
                    <legend>Haluan tilata Puutarhaliike Neilikan uutiskirjeen:</legend>
                    <div class="form-check">
                        <input type="radio" id="kylla" name="uutiskirje" value="kylla" class="form-check-input" checked>
                        <label for="kylla" class="form-check-label">Kyllä</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="ei" name="uutiskirje" value="ei" class="form-check-input">
                        <label for="ei" class="form-check-label">Ei</label>
                    </div>
                </fieldset>

                <button type="submit" class="btn btn-primary">Lähetä</button>
            </form>
        </div>

        <script>
            (function() {
                'use strict';
                var forms = document.querySelectorAll('.needs-validation');
                Array.from(forms).forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            })();
        </script>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>