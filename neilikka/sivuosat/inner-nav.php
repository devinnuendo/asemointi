<?php $active = basename($_SERVER['PHP_SELF'], ".php"); ?>
<nav id="secondary" class="secondary">
    <ul>
        <li class="<?= ($active == 'sisakasvit') ? 'active' : ''; ?>">
            <a href="sisakasvit.php"><span><?= $traLocal['plants_indoor'][$lang] ?></span></a>
        </li>
        <li class="<?= ($active == 'ulkokasvit') ? 'active' : ''; ?>">
            <a href="ulkokasvit.php"><span><?= $traLocal['plants_outdoor'][$lang] ?></span></a>
        </li>
        <li class="<?= ($active == 'tyokaluja') ? 'active' : ''; ?>">
            <a href="tyokaluja.php"><span><?= $traCommon['tools'][$lang] ?></span></a>
        </li>
        <li class="<?= ($active == 'kasvien-hoito') ? 'active' : ''; ?>">
            <a href="kasvien-hoito.php"><span><?= $traLocal['plants_care'][$lang] ?></span></a>
        </li>
    </ul>
</nav>