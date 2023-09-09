<?php
$title = 'Vieritys';
$script = 'scroll.js';
$css = 'styles-scroll.css';
include "head.php";
?>
<main>
    <section>
        <p>Ns. "infinite scroll." Scroll.js hakee fetch-komennolla posts.php-tiedostosta randomoitua lorem ipsum -materiaalia ja sijoittaa sen artikkeleihin. </p>
    </section>
    <section id="posts" class="posts"></section>
</main>
<?php include "footer.php"; ?>