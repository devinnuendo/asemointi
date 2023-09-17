<?php $active = basename($_SERVER['PHP_SELF'], ".php"); ?>
<nav id="main-nav" class="main-nav">
    <ul>
        <li class="brand-logo">
            <a href="../index.php"><img src="favicon.ico" alt="Brand Logo"></a>
        </li>
        <li class="icon"><a href="javascript:void(0);" onclick="menutoggle()">
                <i class="fa fa-bars"></i>
                <i class="fa fa-times"></i>
            </a>
        </li>
        <li class="<?= ($active == 'index') ? 'active' : ''; ?>"><a href="index.php"><span>Tietokanta</span></a></li>
        <li class="<?= ($active == 'elokuva-lisaa') ? 'active' : ''; ?>"><a href="elokuva-lisaa.php"><span>Lisäys</span></a></li>
    </ul>
</nav>