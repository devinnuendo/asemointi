<?php
$title = 'Profiili';
$css = 'styles-profiili.css';
?>

<?php include "head.php"; ?>

<main>
  <section>
    <h2>Perustiedot</h2>
    <p>
      <b>Nimi:</b> Teemu Tietoteknikko<br />
      <b>Sukupuoli:</b> Mies<br />
      <b>Syntymävuosi:</b> 1980<br />
      <b>Asuinpaikka:</b> Espoo
    </p>
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
        <td>Osallistunut tapahtumiin</td>
        <td>10</td>
      </tr>
      <tr>
        <td>Osallistunut projekteihin</td>
        <td>25</td>
      </tr>
      <tr>
        <td>Toiminut ohjaajana</td>
        <td>7</td>
      </tr>
    </table>
    <h2>Oma kuvaus</h2>
    <a href="img/375px-World_of_Warcraft.jpg"><img class="right" src="img/375px-World_of_Warcraft.jpg" /></a>
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
        <label>Nimi:<br />
          <input type="text" name="nimi" /></label>
        <label>Sukupuoli: <br />
          <label><input type="radio" name="sukupuoli" value="mies" /> Mies</label>
          <label><input type="radio" name="sukupuoli" value="nainen" /> Nainen</label>
          <label><input type="radio" name="sukupuoli" value="en-haluasanoa" /> En halua
            sanoa</label></label>
        <label>Yhteydenoton syy: <br />
          <select name="syy">
            <option>Avunpyyntö</option>
            <option>Muu</option>
          </select></label>
        <label>Viesti: <br /><textarea name="viesti"></textarea></label>
        <input type="submit" value="Lähetä" />
      </fieldset>
    </form>
  </section>
</main>
<?php include "footer.php"; ?>