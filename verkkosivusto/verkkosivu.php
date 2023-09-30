<?php
$title = 'Eurooppalainen siili';
$slug = str_replace(' ', '-', strtolower($title));
$css = 'styles-verkkosivu.css';
?>

<?php include "head.php"; ?>

<main class="<?php echo $slug ?>">
  <section>
    <h2>Yleistä tietoa</h2>
    <figure>
      <a href="img/photos/siili.jpg"><img src="img/photos/siili.jpg" alt="Eurooppalainen Siili" /></a>
      <figcaption>Siili kukkien keskellä</figcaption>
    </figure>

    <p>
      Eurooppalainen siili (Erinaceus europaeus) on piikikäs nisäkäs, joka elää monissa
      Euroopan maissa. Se on tunnettu piikkien peittämästä selästään ja yöaktiivisesta
      elämäntavastaan. Siili on suosittu puutarhojen vieras, sillä se syö muun muassa
      ötököitä ja etanoita.
    </p>

    <h3>Siilin ominaispiirteet</h3>
    <ul>
      <li>Paino: 600-1200 grammaa</li>
      <li>Pituus: 20-30 cm</li>
      <li>Ravinto: Hyönteiset, etanat, marjat</li>
      <li>Piikit: Suojana vihollisilta</li>
    </ul>

    <h3>Suojelu</h3>
    <p>
      Eurooppalainen siili on rauhoitettu monissa maissa, sillä sen määrä on vähentynyt.
      Yksi syy tähän on liikenteen aiheuttamat vaarat sekä elinympäristön katoaminen
      kaupungistumisen myötä. Monet järjestöt ja yksityiset ihmiset tekevät töitä siilien
      suojelun eteen.
    </p>

    <h3>Lisätietoa</h3>
    <p>
      Lisätietoa eurooppalaisesta siilistä voit lukea
      <a href="https://fi.wikipedia.org/wiki/Siili">Wikipediasta</a>.
    </p>

    <h4>Tilastotietoa</h4>
    <table>
      <tr>
        <th>Tiedot</th>
        <th>Arvo</th>
      </tr>
      <tr>
        <td>Uhanalaisuusluokitus</td>
        <td>LC (Vähiten huolestuttava)</td>
      </tr>
      <tr>
        <td>Elinalue</td>
        <td>Koko Eurooppa</td>
      </tr>
    </table>
  </section>
</main>
<?php include "footer.php"; ?>