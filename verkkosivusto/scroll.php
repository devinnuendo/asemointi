<?php
$title = 'Vieritys';
$script = 'scroll.js';
$css = 'styles-scroll.css';
include "head.php";
?>
<main>
    <section>
        <p>Ns. "infinite scroll." Scroll.js hakee fetch-komennolla posts.php-tiedostosta randomoitua lorem ipsum -materiaalia ja sijoittaa sen artikkeleihin. </p>
        <h2>Olennaiset tiedostot</h2>
        <ul>
            <li><a href="https://github.com/devinnuendo/asemointi/blob/main/verkkosivusto/scroll.php">scroll.php</a></li>
            <li><a href="https://github.com/devinnuendo/asemointi/blob/main/verkkosivusto/posts.php">posts.php</a></li>
            <li><a href="https://github.com/devinnuendo/asemointi/blob/main/verkkosivusto/scripts/scroll.js">scroll.js</a></li>
            <li><a href="https://github.com/devinnuendo/asemointi/blob/main/verkkosivusto/css/styles-scroll.css">styles-scroll.css</a></li>
        </ul>
    </section>
    <section id="posts" class="posts"></section>
</main>
<?php include "footer.php"; ?>