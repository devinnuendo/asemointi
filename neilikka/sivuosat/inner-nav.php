<?php $active = basename($_SERVER['PHP_SELF'], ".php"); ?>
<nav id="secondary" class="secondary">
    <ul>
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
</nav>