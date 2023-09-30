<?php
$title = 'Kuvagalleria';
$slug = str_replace(' ', '-', strtolower($title));
$css = 'styles-kuvagalleria.css';
?>

<?php include "head.php"; ?>

<main class="<?php echo $slug ?>">
  <section>
    <h2>Galleria 1</h2>
    <div class="gallery">
      <div class="sailio">
        <a href="img/photos/siili.jpg"><img src="img/photos/siili.jpg" alt="Siili kukkien keskellä" /></a>
        <div class="kuvaus">Siili kukkien keskellä</div>
      </div>
      <div class="sailio">
        <a href="../neilikka/img/photos/carnation-1325012_640.jpg"><img src="../neilikka/img/photos/carnation-1325012_640.jpg" alt="neilikka" /></a>
        <div class="kuvaus">Neilikoita</div>
      </div>
      <div class="sailio">
        <a href="../neilikka/img/photos/bunch-of-flowers-1018557_640.jpg"><img src="../neilikka/img/photos/bunch-of-flowers-1018557_640.jpg" alt="kukkakimppu" /></a>
        <div class="kuvaus">Kukkakimppu</div>
      </div>
      <div class="sailio">
        <a href="../neilikka/img/photos/flower-1696533_640.jpg"><img src="../neilikka/img/photos/flower-1696533_640.jpg" alt="kukkakauppa" /></a>
        <div class="kuvaus">Kukkakauppa</div>
      </div>
    </div>

    <h2>Galleria 2</h2>
    <div class="gallery">
      <div class="sailio">
        <a href="../asemointi/img/photos/leaves.jpg"><img src="../asemointi/img/photos/leaves.jpg" alt="Lehtiä" /></a>
        <div class="kuvaus">Lehtiä</div>
      </div>
      <div class="sailio">
        <a href="../neilikka/img/photos/flower-3231083_640.jpg"><img src="../neilikka/img/photos/flower-3231083_640.jpg" alt="Kukkameri" /></a>
        <div class="kuvaus">Kukkameri</div>
      </div>
      <div class="sailio">
        <a href="../neilikka/img/photos/flower-1829711_640.png"><img src="../neilikka/img/photos/flower-1829711_640.png" alt="Joulukukkia" /></a>
        <div class="kuvaus">Joulukukkia</div>
      </div>
      <div class="sailio">
        <a href="img/photos/375px-World_of_Warcraft.jpg"><img src="img/photos/375px-World_of_Warcraft.jpg" alt="World of Warcraft" /></a>
        <div class="kuvaus">WoW</div>
      </div>
    </div>
  </section>
</main>
<?php include "footer.php"; ?>