<?php
$active = basename($_SERVER['PHP_SELF'], ".php");

?>
<nav id="mainmenu" class="mainmenu">
    <a class="logo" href="../index.php">
        <img src="img/carnation.png" height="48px" title="Puutarhaliike Neilikka brand logo" />
    </a>
    <a href="https://www.flaticon.com/free-icons/flower" class="displaynone">Flower icons created by Freepik - Flaticon</a>
    <a class="logotext" href="index.php"><span>Puutarhaliike Neilikka</span></a>

    <input type="checkbox" id="menu-toggle" class="menu-toggle tooltip below" data-tooltip="<?= $traCommon['menu'][$lang]; ?>" aria-expanded="false" aria-controls="mainmenu-ul" />
    <label for="menu-toggle" class="icon open">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <span class="scr">open menu</span>
    </label>
    <label for="menu-toggle" class="icon close">
        <i class="fa fa-times" aria-hidden="true"></i>
        <span class="scr">close menu</span>
    </label>

    <ul id="mainmenu-ul">
        <li class="<?= ($active == 'index') ? 'active' : ''; ?>">
            <a href="index.php"><span>
                    <?= $traCommon['frontpage'][$lang]; ?>
                </span>
            </a>
        </li>
        <li class="li-submenu <?= ($active == 'tuotteet') ? 'active' : ''; ?>">
            <a href="tuotteet.php">
                <?= $traCommon['products'][$lang]; ?>
            </a>
            <input type="checkbox" id="submenu-toggle" class="submenu-toggle" aria-expanded="false" aria-controls="submenu" />
            <label for="submenu-toggle" class="plusicon open">
                <i class="fa fa-plus" aria-hidden="true"></i>
                <span class="scr">open submenu</span>
            </label>
            <label for="submenu-toggle" class="minusicon close">
                <i class="fa fa-minus" aria-hidden="true"></i>
                <span class="scr">close submenu</span>
            </label>
            <ul class="submenu" id="submenu">
                <li class="<?= ($active == 'sisakasvit') ? 'active' : ''; ?>">
                    <a href="sisakasvit.php">
                        <span>
                            <?= $traLocal['plants_indoor'][$lang]; ?>
                        </span>
                    </a>
                </li>
                <li class="<?= ($active == 'ulkokasvit') ? 'active' : ''; ?>">
                    <a href="ulkokasvit.php">
                        <span>
                            <?= $traLocal['plants_outdoor'][$lang]; ?>
                        </span>
                    </a>
                </li>
                <li class="<?= ($active == 'tyokaluja') ? 'active' : ''; ?>">
                    <a href="tyokaluja.php">
                        <span>
                            <?= $traCommon['tools'][$lang]; ?>
                        </span>
                    </a>
                </li>
                <li class="<?= ($active == 'kasvien-hoito') ? 'active' : ''; ?>">
                    <a href="kasvien-hoito.php">
                        <span>
                            <?= $traLocal['plants_care'][$lang]; ?>
                        </span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="li-submenu <?= ($active == 'tietoa') ? 'active' : ''; ?>">
            <a href="tietoa.php">
                <span>
                    <?= $traCommon['about_us'][$lang]; ?>
                </span>
            </a>
            <input type="checkbox" id="submenu-toggle2" class="submenu-toggle" aria-expanded="false" aria-controls="submenu2" />
            <label for="submenu-toggle2" class="plusicon open">
                <i class="fa fa-plus" aria-hidden="true"></i>
                <span class="scr">open submenu</span>
            </label>
            <label for="submenu-toggle2" class="minusicon close">
                <i class="fa fa-minus" aria-hidden="true"></i>
                <span class="scr">close submenu</span>
            </label>
            <ul class="submenu" id="submenu2">
                <li class="<?= ($active == 'myymalat') ? 'active' : ''; ?>">
                    <a href="myymalat.php">
                        <span>
                            <?= $traCommon['stores'][$lang]; ?>
                        </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="<?= ($active == 'yhteydenotto') ? 'active' : ''; ?>">
            <a href="yhteydenotto.php">
                <span>
                    <?= $traCommon['contact_us'][$lang]; ?>
                </span>
            </a>
        </li>
    </ul>

    <?php
    if ($loggedIn) {
    ?>
        <div class="li-submenu user <?= ($active == 'profiili' || $active == 'toimitus' || $active == 'laskutus') ? 'active' : ''; ?> tooltip below" data-tooltip="<?= $traCommon['user'][$lang]; ?>">
            <a href="profiili.php" class="full">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span class="scr">
                    <?= $traCommon['profile'][$lang]; ?>
                </span>
            </a>
            <input type="checkbox" id="submenu-toggle3" class="submenu-toggle" aria-expanded="false" aria-controls="submenu3" />
            <label for="submenu-toggle3" class="plusicon open">
                <i class="fa fa-plus" aria-hidden="true"></i>
                <span class="scr">open submenu</span>
            </label>
            <label for="submenu-toggle3" class="minusicon close">
                <i class="fa fa-minus" aria-hidden="true"></i>
                <span class="scr">close submenu</span>
            </label>
            <ul class="submenu" id="submenu3">
                <li class="<?= ($active == 'profiili') ? 'active' : ''; ?>">
                    <a href="profiili.php">
                        <span>
                            <?= $traCommon['profile'][$lang]; ?>
                        </span>
                    </a>
                </li>
                <?php
                if ($admin) {
                ?>
                    <li class="<?= ($active == 'admin') ? 'active' : ''; ?>">
                        <a href="admin.php">
                            <span>Admin</span>
                        </a>
                    </li>
                <?php
                };
                ?>
                <li class="<?= ($active == 'toimitus') ? 'active' : ''; ?>">
                    <a href="toimitus.php">
                        <span>
                            <?= $traCommon['address_delivery'][$lang]; ?>
                        </span>
                    </a>
                </li>
                <li class="<?= ($active == 'laskutus') ? 'active' : ''; ?>">
                    <a href="laskutus.php">
                        <span>
                            <?= $traCommon['address_billing'][$lang]; ?>
                        </span>
                    </a>
                </li>
                <li>
                    <form method="post" action="kirjaudu-ulos-kasittely.php" class="reset form-logout" id="form-logout">
                        <input type="hidden" name="logout" checked />
                        <button type="submit">
                            <?= $traCommon['logout'][$lang]; ?>
                        </button>
                    </form>
                </li>
            </ul>

        </div>
    <?php
    } else { ?>
        <div class="li-submenu user <?= ($active == 'rekisteroidy' || $active == 'kirjaudu') ? 'active' : ''; ?>">

            <a href="kirjaudu.php" class="full">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span class="scr">
                    <?= $traCommon['login'][$lang]; ?>
                </span>
            </a>
            <input type="checkbox" id="submenu-toggle3" class="submenu-toggle" aria-expanded="false" aria-controls="submenu3" />
            <label for="submenu-toggle3" class="plusicon open">
                <i class="fa fa-plus" aria-hidden="true"></i>
                <span class="scr">open submenu</span>
            </label>
            <label for="submenu-toggle3" class="minusicon close">
                <i class="fa fa-minus" aria-hidden="true"></i>
                <span class="scr">close submenu</span>
            </label>
            <ul class="submenu" id="submenu3">
                <li class="<?= ($active == 'kirjaudu') ? 'active' : ''; ?>">
                    <a href="kirjaudu.php">
                        <span>
                            <?= $traCommon['login'][$lang]; ?>
                        </span>
                    </a>
                </li>
                <li class="<?= ($active == 'rekisteroidy') ? 'active' : ''; ?>">
                    <a href="rekisteroidy.php">
                        <span>
                            <?= $traCommon['register'][$lang]; ?>
                        </span>
                    </a>
                </li>
            </ul>

        </div>
    <?php
    }; ?>

    <div class="flex">
        <div class="cart tooltip below" data-tooltip="
    <?= $traCommon['cart'][$lang]; ?>
">
            <a href="ostoskori.php">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="scr">
                    <?= $traCommon['cart'][$lang]; ?>
                </span>
            </a>
        </div>

        <form method="post" class="reset language-switcher" id="language-select">

            <input type="checkbox" id="submenu-toggle4" class="submenu-toggle  tooltip below left absolute" data-tooltip="<?= $traCommon['language'][$lang]; ?>" aria-expanded="false" aria-controls="options-list" />
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
                    <button type="submit" name="toggle_language" value="fi" class="<?php echo ($lang === 'fi') ? 'selected' : ''; ?> tooltip above" data-tooltip="Suomi" aria-label="<?= $traCommon['language'][$lang]; ?> Suomi" lang="fi">
                        <span class="option">fi</span>
                    </button>
                </li>
                <li>
                    <button type="submit" name="toggle_language" value="en" class="<?php echo ($lang === 'en') ? 'selected' : ''; ?> tooltip above" data-tooltip="English" aria-label="<?= $traCommon['language'][$lang]; ?> English" lang="en">
                        <span class="option">en</span>
                    </button>
                </li>
                <li>
                    <button type="submit" name="toggle_language" value="sv" class="<?php echo ($lang === 'sv') ? 'selected' : ''; ?> tooltip above" data-tooltip="Svenska" aria-label="<?= $traCommon['language'][$lang]; ?> Svenska" lang="sv">
                        <span class="option">sv</span>
                    </button>
                </li>
            </ul>
        </form>
    </div>

</nav>