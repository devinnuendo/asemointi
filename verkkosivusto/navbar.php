<?php $active = basename($_SERVER['PHP_SELF'], ".php"); ?>
<nav id="main-nav">
    <ul>
        <li class="brand-logo">
            <a href="profiili.php"><img src="https://jenniina.fi/wp-content/uploads/2022/09/favicon.ico" alt="Brand Logo"></a>
        </li>
        <li class="icon"><a href="javascript:void(0);" onclick="menutoggle()">
                <i class="fa fa-bars"></i>
            </a>
        </li>
        <li class="<?= ($active == 'index') ? 'active' : ''; ?>"><a href="index.php">Galleria</a></li>
        <li class="<?= ($active == 'profiili') ? 'active' : ''; ?>"><a href="profiili.php">Profiili</a></li>
        <li class="<?= ($active == 'verkkosivu') ? 'active' : ''; ?>"><a href="verkkosivu.php">Siili</a></li>
        <li class="<?= ($active == 'lomake') ? 'active' : ''; ?>"><a href="lomake.php">Rekisteröidy</a></li>
    </ul>
</nav>