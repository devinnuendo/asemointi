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
            <a href="index.php"><span>Etusivu</span></a>
        </li>
        <li class="tuotteetmenu <?= ($active == 'tuotteet') ? 'active' : ''; ?>">
            <a href="tuotteet.php">Tuotteet</a>
            <input type="checkbox" id="submenu-toggle" aria-expanded="false" aria-controls="submenu" />
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

        <li class="<?= ($active == 'myymalat') ? 'active' : ''; ?>">
            <a href="myymalat.php"><span>Myymälät</span></a>
        </li>
        <li class="<?= ($active == 'tietoa') ? 'active' : ''; ?>">
            <a href="tietoa.php"><span>Tietoa meistä</span></a>
        </li>
        <li class="<?= ($active == 'yhteydenotto') ? 'active' : ''; ?>">
            <a href="yhteydenotto.php"><span>Ota yhteyttä</span></a>
        </li>
    </ul>
</nav>