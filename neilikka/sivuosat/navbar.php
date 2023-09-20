<?php $active = basename($_SERVER['PHP_SELF'], ".php"); ?>
<nav id="mainmenu" class="mainmenu">
    <a class="logo" href="../index.php">
        <img src="img/carnation.png" height="48px" title="Puutarhaliike Neilikka brand logo" />
    </a>
    <a href="https://www.flaticon.com/free-icons/flower" class="displaynone">Flower icons created by Freepik - Flaticon</a>
    <a class="logotext" href="index.php"><span>Puutarhaliike Neilikka</span></a>

    <div class="li-submenu user <?= ($active == 'rekisteroidy' || $active == 'kirjaudu' || $active == 'toimitus' || $active == 'laskutus') ? 'active' : ''; ?>">
        <a href="profiili.php" class="full">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span class="scr">Profiili</span>
        </a>
        <input type="checkbox" id="submenu-toggle3" class="submenu-toggle" aria-expanded="false" aria-controls="submenu3" />
        <label for="submenu-toggle3" class="plusicon open"><i class="fa fa-plus" aria-hidden="true"></i>
            <span class="scr">open submenu</span>
        </label>
        <label for="submenu-toggle3" class="minusicon close"><i class="fa fa-minus" aria-hidden="true"></i><span class="scr">close submenu</span></label>
        <ul class="submenu" id="submenu">
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
    </div>

    <input type="checkbox" id="menu-toggle" class="menu-toggle" aria-expanded="false" aria-controls="mainmenu-ul" />
    <label for="menu-toggle" class="icon open"><i class="fa fa-bars" aria-hidden="true"></i><span class="scr">open menu</span></label>
    <label for="menu-toggle" class="icon close"><i class="fa fa-times" aria-hidden="true"></i><span class="scr">close menu</span></label>

    <ul id="mainmenu-ul">
        <li class="<?= ($active == 'index') ? 'active' : ''; ?>">
            <a href="index.php"><span>Etusivu</span></a>
        </li>
        <li class="li-submenu <?= ($active == 'tuotteet') ? 'active' : ''; ?>">
            <a href="tuotteet.php">Tuotteet</a>
            <input type="checkbox" id="submenu-toggle" class="submenu-toggle" aria-expanded="false" aria-controls="submenu" />
            <label for="submenu-toggle" class="plusicon open"><i class="fa fa-plus" aria-hidden="true"></i>
                <span class="scr">open submenu</span>
            </label>
            <label for="submenu-toggle" class="minusicon close"><i class="fa fa-minus" aria-hidden="true"></i><span class="scr">close submenu</span></label>
            <ul class="submenu" id="submenu">
                <li class="<?= ($active == 'sisakasvit') ? 'active' : ''; ?>">
                    <a href="sisakasvit.php"><span>Sisäkasvit</span></a>
                </li>
                <li class="<?= ($active == 'ulkokasvit') ? 'active' : ''; ?>">
                    <a href="ulkokasvit.php"><span>Ulkokasvit</span></a>
                </li>
                <li class="<?= ($active == 'tyokaluja') ? 'active' : ''; ?>">
                    <a href="tyokaluja.php"><span>Työkalut</span></a>
                </li>
                <li class="<?= ($active == 'kasvien-hoito') ? 'active' : ''; ?>">
                    <a href="kasvien-hoito.php"><span>Kasvien hoito</span></a>
                </li>
            </ul>
        </li>

        <li class="li-submenu <?= ($active == 'tietoa') ? 'active' : ''; ?>">
            <a href="tietoa.php"><span>Tietoa meistä</span></a>
            <input type="checkbox" id="submenu-toggle2" class="submenu-toggle" aria-expanded="false" aria-controls="submenu2" />
            <label for="submenu-toggle2" class="plusicon open"><i class="fa fa-plus" aria-hidden="true"></i>
                <span class="scr">open submenu</span>
            </label>
            <label for="submenu-toggle2" class="minusicon close"><i class="fa fa-minus" aria-hidden="true"></i><span class="scr">close submenu</span></label>
            <ul class="submenu" id="submenu2">
                <li class="<?= ($active == 'myymalat') ? 'active' : ''; ?>">
                    <a href="myymalat.php"><span>Myymälät</span></a>
                </li>
            </ul>
        </li>
        <li class="<?= ($active == 'yhteydenotto') ? 'active' : ''; ?>">
            <a href="yhteydenotto.php"><span>Ota yhteyttä</span></a>
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
</nav>