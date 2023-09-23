<footer>
    <address>
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
    </address>
    <small>
        <a href="mailto:asiakaspalvelu@puutarhaliikeneilikka.fi">asiakaspalvelu@puutarhaliikeneilikka.fi</a>
        <small class="sep" aria-hidden="true">🙐</small>
        <span>&copy;<?php echo date("Y"); ?> Jenniina Laine</span>
        <small class="sep" aria-hidden="true">🙖</small>
        <span>Kuvat Pixabay ja Flaticon</span>
    </small>

</footer>
</body>

</html>