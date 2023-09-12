<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["kayttajatunnus"])) {
        // Tarkistetaan käyttäjätunnus, tässä voisi olla tarkempaa logiikkaa
        $kayttajatunnus = $_POST["kayttajatunnus"];
        if ($kayttajatunnus === "admin" && $_POST["salasana"] === "salasana") {
            $_SESSION["kirjautunut"] = true;
            header("Location: sessio.php");
            exit();
        } else {
            $virheviesti = "Virheellinen käyttäjätunnus tai salasana.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <title>Kirjaudu</title>
</head>

<body>
    <h1>Kirjaudu Sisään</h1>
    <form method="post">
        <label for="kayttajatunnus">Käyttäjätunnus:</label>
        <input type="text" id="kayttajatunnus" name="kayttajatunnus" required>
        <label for="salasana">Salasana:</label>
        <input type="password" id="salasana" name="salasana" required>
        <button type="submit">Kirjaudu</button>
    </form>
    <?php
    if (isset($virheviesti)) {
        echo "<p>$virheviesti</p>";
    }
    ?>
</body>

</html>