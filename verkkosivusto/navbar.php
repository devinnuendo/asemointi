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
        <li class="<?= ($active == 'index') ? 'active' : ''; ?>"><a href="index.php"><span>Galleria</span></a></li>
        <li class="<?= ($active == 'profiili') ? 'active' : ''; ?>"><a href="profiili.php"><span>Profiili</span></a></li>
        <li class="<?= ($active == 'verkkosivu') ? 'active' : ''; ?>"><a href="verkkosivu.php"><span>Siili</span></a></li>
        <li class="<?= ($active == 'lomake') ? 'active' : ''; ?>"><a href="lomake.php"><span>Rekisteröidy</span></a></li>
        <li class="<?= ($active == 'scroll') ? 'active' : ''; ?>"><a href="scroll.php"><span>Vieritys</span></a></li>
    </ul>
</nav>