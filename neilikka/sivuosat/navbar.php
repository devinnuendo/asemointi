<?php $active = basename($_SERVER['PHP_SELF'], ".php"); ?>
<nav id="mainmenu" class="mainmenu">
    <a class="logo" href="../index.php">
        <img src="img/carnation.png" height="48px" title="Puutarhaliike Neilikka brand logo" />
    </a>
    <a href="https://www.flaticon.com/free-icons/flower" class="displaynone">Flower icons created by Freepik - Flaticon</a>
    <a class="logotext" href="index.php"><span>Puutarhaliike Neilikka</span></a>

    <input type="checkbox" id="menu-toggle" class="menu-toggle" aria-expanded="false" aria-controls="mainmenu-ul" />
    <label for="menu-toggle" class="icon open"><i class="fa fa-bars" aria-hidden="true"></i><span class="scr">open menu</span></label>
    <label for="menu-toggle" class="icon close"><i class="fa fa-times" aria-hidden="true"></i><span class="scr">close menu</span></label>

    <ul id="mainmenu-ul">
        <li class="<?= ($active == 'index') ? 'active' : ''; ?>">
            <a href="index.php"><span><?= $tra['frontpage'][$lang]; ?></span></a>
        </li>
        <li class="li-submenu <?= ($active == 'tuotteet') ? 'active' : ''; ?>">
            <a href="tuotteet.php"><?= $tra['products'][$lang]; ?></a>
            <input type="checkbox" id="submenu-toggle" class="submenu-toggle" aria-expanded="false" aria-controls="submenu" />
            <label for="submenu-toggle" class="plusicon open"><i class="fa fa-plus" aria-hidden="true"></i>
                <span class="scr">open submenu</span>
            </label>
            <label for="submenu-toggle" class="minusicon close"><i class="fa fa-minus" aria-hidden="true"></i><span class="scr">close submenu</span></label>
            <ul class="submenu" id="submenu">
                <li class="<?= ($active == 'sisakasvit') ? 'active' : ''; ?>">
                    <a href="sisakasvit.php"><span><?= $tra['plants_inside'][$lang]; ?></span></a>
                </li>
                <li class="<?= ($active == 'ulkokasvit') ? 'active' : ''; ?>">
                    <a href="ulkokasvit.php"><span><?= $tra['plants_outside'][$lang]; ?></span></a>
                </li>
                <li class="<?= ($active == 'tyokaluja') ? 'active' : ''; ?>">
                    <a href="tyokaluja.php"><span><?= $tra['tools'][$lang]; ?></span></a>
                </li>
                <li class="<?= ($active == 'kasvien-hoito') ? 'active' : ''; ?>">
                    <a href="kasvien-hoito.php"><span><?= $tra['plant_care'][$lang]; ?></span></a>
                </li>
            </ul>
        </li>

        <li class="li-submenu <?= ($active == 'tietoa') ? 'active' : ''; ?>">
            <a href="tietoa.php"><span><?= $tra['about_us'][$lang]; ?></span></a>
            <input type="checkbox" id="submenu-toggle2" class="submenu-toggle" aria-expanded="false" aria-controls="submenu2" />
            <label for="submenu-toggle2" class="plusicon open"><i class="fa fa-plus" aria-hidden="true"></i>
                <span class="scr">open submenu</span>
            </label>
            <label for="submenu-toggle2" class="minusicon close"><i class="fa fa-minus" aria-hidden="true"></i><span class="scr">close submenu</span></label>
            <ul class="submenu" id="submenu2">
                <li class="<?= ($active == 'myymalat') ? 'active' : ''; ?>">
                    <a href="myymalat.php"><span><?= $tra['stores'][$lang]; ?></span></a>
                </li>
            </ul>
        </li>
        <li class="<?= ($active == 'yhteydenotto') ? 'active' : ''; ?>">
            <a href="yhteydenotto.php"><span><?= $tra['contact_us'][$lang]; ?></span></a>
        </li>
        <!-- <li class="li-submenu user <?= ($active == 'rekisteroidy' || $active == 'kirjaudu' || $active == 'toimitus' || $active == 'laskutus') ? 'active' : ''; ?>">
            <input type="checkbox" id="submenu-toggle3" class="submenu-toggle" aria-expanded="false" aria-controls="submenu3" />
            <label for="submenu-toggle3" class="full">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span class="scr">open submenu</span>
                <span class="scr">close submenu</span>
            </label>
            <ul class="submenu" id="submenu3">
                <li class="<?= ($active == 'rekisteroidy') ? 'active' : ''; ?>">
                    <a href="rekisteroidy.php"><span>Rekisteröidy</span></a>
                </li>
                <li class="<?= ($active == 'kirjaudu') ? 'active' : ''; ?>">
                    <a href="kirjaudu.php"><span>Kirjaudu</span></a>
                </li>
                <li class="<?= ($active == 'toimitus') ? 'active' : ''; ?>">
                    <a href="toimitus.php"><span>Toimitusosoite</span></a>
                </li>
                <li class="<?= ($active == 'laskutus') ? 'active' : ''; ?>">
                    <a href="laskutus.php"><span>Laskutusosoite</span></a>
                </li>
            </ul>
        </li> -->
    </ul>

    <div class="li-submenu user <?= ($active == 'rekisteroidy' || $active == 'kirjaudu' || $active == 'toimitus' || $active == 'laskutus') ? 'active' : ''; ?>">

        <a href="profiili.php" class="full">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span class="scr"><?= $tra['profile'][$lang]; ?></span>
        </a>
        <input type="checkbox" id="submenu-toggle3" class="submenu-toggle" aria-expanded="false" aria-controls="submenu3" />
        <label for="submenu-toggle3" class="plusicon open"><i class="fa fa-plus" aria-hidden="true"></i>
            <span class="scr">open submenu</span>
        </label>
        <label for="submenu-toggle3" class="minusicon close"><i class="fa fa-minus" aria-hidden="true"></i><span class="scr">close submenu</span></label>
        <ul class="submenu" id="submenu3">
            <li class="<?= ($active == 'profiili') ? 'active' : ''; ?>">
                <a href="profiili.php"><span><?= $tra['profile'][$lang]; ?></span></a>
            </li>
            <li class="<?= ($active == 'rekisteroidy') ? 'active' : ''; ?>">
                <a href="rekisteroidy.php"><span><?= $tra['register'][$lang]; ?></span></a>
            </li>
            <li class="<?= ($active == 'kirjaudu') ? 'active' : ''; ?>">
                <a href="kirjaudu.php"><span><?= $tra['login'][$lang]; ?></span></a>
            </li>
            <li class="<?= ($active == 'toimitus') ? 'active' : ''; ?>">
                <a href="toimitus.php"><span><?= $tra['address_delivery'][$lang]; ?></span></a>
            </li>
            <li class="<?= ($active == 'laskutus') ? 'active' : ''; ?>">
                <a href="laskutus.php"><span><?= $tra['address_billing'][$lang]; ?></span></a>
            </li>
        </ul>
    </div>

    <!-- <form method="post" class="reset language-switcher">
        <label for="language-main" class="scr">Switch language</label>
        <select name="toggle_language" id="language-main" onchange="this.form.submit()">
            <option value="en" <?php echo ($lang === 'en') ? 'selected' : ''; ?> lang="en">English</option>
            <option value="fi" <?php echo ($lang === 'fi') ? 'selected' : ''; ?> lang="fi">Suomi</option>
            <option value="sv" <?php echo ($lang === 'sv') ? 'selected' : ''; ?> lang="sv"> Svenska</option>
        </select>
    </form> -->

    <form method="post" class="reset language-switcher" id="language-select">
        <input type="checkbox" id="submenu-toggle4" class="submenu-toggle" aria-expanded="false" aria-controls="options-list" />
        <label for="submenu-toggle4" class="language-label open">
            <i><?= $lang ?></i>
            <span class="scr">open language menu</span>
        </label>
        <label for="submenu-toggle4" class="language-label close">
            <i><?= $lang ?></i>
            <span class="scr">close language menu</span>
        </label>
        <ul class="submenu options-list" id="options-list">
            <li>
                <button type="submit" name="toggle_language" value="en" class="<?php echo ($lang === 'en') ? 'selected' : ''; ?>">
                    <abbr title="English" lang="en"><span class="option">en</span></abbr>
                </button>
            </li>
            <li>
                <button type="submit" name="toggle_language" value="fi" class="<?php echo ($lang === 'fi') ? 'selected' : ''; ?>">
                    <abbr title="Suomi" lang="fi"><span class="option">fi</span></abbr>
                </button>
            </li>
            <li>
                <button type="submit" name="toggle_language" value="sv" class="<?php echo ($lang === 'sv') ? 'selected' : ''; ?>">
                    <abbr title="Svenska" lang="sv"><span class="option">sv</span></abbr>
                </button>
            </li>
        </ul>
    </form>

</nav>