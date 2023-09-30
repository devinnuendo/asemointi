<?php
$title = 'Profiili';
$slug = str_replace(' ', '-', strtolower($title));
$css = 'styles-profiili.css';
?>

<?php include "head.php"; ?>

<main class="<?php echo $slug ?>">
  <section>
    <h2>Perustiedot</h2>
    <ul>
      <li><b>Nimi:</b> Esko Esimerkki</li>
      <li><b>Sukupuoli:</b> Mies</li>
      <li><b>Syntymävuosi:</b> 1980</li>
      <li><b>Asuinpaikka:</b> Espoo</li>
    </ul>
    <h2>Harrastukset</h2>
    <ul>
      <li>Videopelit</li>
      <li>Koodaaminen</li>
      <li>Lentopallo</li>
      <li>Ulkoilu koiran kanssa</li>
    </ul>
    <h2>Tilastotietoa</h2>
    <table>
      <tr>
        <th>Osallistunut tapahtumiin</th>
        <td>10</td>
      </tr>
      <tr>
        <th>Osallistunut projekteihin</th>
        <td>25</td>
      </tr>
      <tr>
        <th>Toiminut ohjaajana</th>
        <td>7</td>
      </tr>
    </table>
    <h2>Oma kuvaus</h2>
    <a href="img/photos/375px-World_of_Warcraft.jpg"><img class="right" src="img/photos/375px-World_of_Warcraft.jpg" /></a>
    <p>
      Olen puuhaillut tietokoneiden parissa ihan pienestä pitäen. Tällä hetkellä
      työskentelen pelifirmassa koodarina.
    </p>
    <p>
      Rakastan videopelejä. Suosikkigenreni ovat toimintapelit ja roolipelit.
      Tietokoneella istumisen vastapainona harrastan lentopalloa, ja koirakin raahaa
      mukanaan lenkille joka päivä.
    </p>
    <p>
      Suosikkipelini on
      <a href="https://fi.wikipedia.org/wiki/World_of_Warcraft">World of Warcraft</a>.
    </p>
  </section>
  <section>
    <form>
      <fieldset>
        <legend>Yhteydenotto</legend>
        <label>Nimi:
          <input type="text" name="nimi" /></label>
        <label>Sukupuoli:
          <label><input type="radio" name="sukupuoli" value="mies" /> Mies</label>
          <label><input type="radio" name="sukupuoli" value="nainen" /> Nainen</label>
          <label><input type="radio" name="sukupuoli" value="en-haluasanoa" /> En halua
            sanoa</label></label>
        <label>Yhteydenoton syy:
          <select name="syy">
            <option>Avunpyyntö</option>
            <option>Muu</option>
          </select></label>
        <label>Viesti: <textarea name="viesti"></textarea></label>
        <input type="submit" value="Lähetä" />
      </fieldset>
    </form>
  </section>
</main>
<?php include "footer.php"; ?>