<?php
$title = 'Vieritys';
$script = 'scroll.js';
$css = 'styles-scroll.css';
include "head.php";
?>
<main>
    <section>
        <p>Ns. "infinite scroll." Scroll.js hakee fetch-komennolla posts.php-tiedostosta randomoitua lorem ipsum -materiaalia ja sijoittaa sen artikkeleihin. </p>
        <small>
            <pre>
&lt;article&gt;
  &lt;header&gt;
    &lt;h2&gt;
      &lt;span&gt;ID.&lt;/span&gt;
      &lt;span&gt;Title&lt;/span&gt;
    &lt;/h2&gt;
  &lt;/header&gt;
  &lt;p&gt;Content&lt;/p&gt;
&lt;/article&gt;           
            </pre>
        </small>
    </section>
    <section id="posts" class="posts"></section>
</main>
<?php include "footer.php"; ?>