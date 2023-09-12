<?php
session_start();

// Tehtävä 1: Käsitellään lomakkeen tiedot ja asetetaan sessioparametreja
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["avain"]) && isset($_POST["arvo"])) {
        $avain = $_POST["avain"];
        $arvo = $_POST["arvo"];
        $_SESSION[$avain] = $arvo;
    }
}

// Tehtävä 2: Tuhotaan sessioparametrit ja suljetaan sessio, jos "ulos" on asetettu
if (isset($_GET["ulos"]) && $_GET["ulos"] == "k") {
    session_unset(); // Poistetaan sessioparametrit
    session_destroy(); // Suljetaan sessio
}

$title = 'Sessiot';
$slug = str_replace(' ', '-', strtolower($title));
$css = 'styles-perusphp.css';
?>

<?php include "head.php"; ?>

<?php
?>
<main class="<?php echo $slug ?>">

    <section>
        <header>
            <h2><a href="https://moodle.omnia.fi/mod/page/view.php?id=564060">Tehtäviä: Sessiot</a></h2>
            <nav>
                <ul>
                    <?php
                    if (isset($_SESSION["kirjautunut"]) && $_SESSION["kirjautunut"] === true) {
                        echo '<li><a href="perus.php">Muut tehtävät</a></li>';
                    } else {
                        echo '<li><a href="kirjaudu.php">Kirjaudu</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </header>
        <h3>Tehtävä 1: Aseta Sessioparametreja</h3>
        <form method="post">
            <label for="avain">Avain:</label>
            <input type="text" id="avain" name="avain" required>
            <label for="arvo">Arvo:</label>
            <input type="text" id="arvo" name="arvo" required>
            <button type="submit">Aseta</button>
        </form>
        <h4>Asetetut Sessioparametrit:</h4>
        <ul>
            <?php
            foreach ($_SESSION as $avain => $arvo) {
                echo "<li>$avain: $arvo</li>";
            }
            ?>
        </ul>
    </section>

    <section>
        <h3>Tehtävä 2: Tuhotaan Sessioparametrit</h3>
        <a href="sessio.php?ulos=k">Tuhotaan Sessioparametrit ja Suljetaan Sessio</a>
    </section>

</main>

<?php include "footer.php"; ?>