<?php
$title = 'Nettikauppaan rekisteröityminen';
$css = 'styles-lomake.css';
?>

<?php include "head.php"; ?>

<main>
  <section>
    <form>
      <fieldset>
        <legend>Yhteystiedot</legend>
        <label for="nimi">Nimi</label>
        <input type="text" name="nimi" id="nimi" placeholder="Nimi" required />

        <label for="katuosoite">Katuosoite</label>
        <input type="text" name="katuosoite" id="katuosoite" placeholder="Katuosoite" />

        <label for="postinumero">Postinumero</label>
        <input type="number" name="postinumero" id="postinumero" placeholder="Postinumero" />

        <label for="postitoimipaikka">Postitoimipaikka</label>
        <input type="text" name="postitoimipaikka" id="postitoimipaikka" placeholder="Postitoimipaikka" />

        <label for="puhelinnumero">Puhelinnumero</label>
        <input type="tel" name="puhelinnumero" id="puhelinnumero" placeholder="Puhelinnumero" pattern="^[\d]{7,15}$" required />

        <label for="sahkopostiosoite">Sähköpostiosoite</label>
        <input type="email" name="sahkopostiosoite" id="sahkopostiosoite" placeholder="Sähköpostiosoite" minlength="12" required pattern="^[A-Za-z0-9+_.-]+@(.+)\.[A-Za-z0-9]{2,}$" />

        <label for="salasana">Salasana</label>
        <input type="password" name="salasana" id="salasana" placeholder="Salasana" required />
      </fieldset>

      <fieldset class="osastot">
        <legend>Mistä osastoista olet kiinnostunut?</legend>

        <label><input type="checkbox" name="osasto" value="Muoti" />Muoti</label>

        <label><input type="checkbox" name="osasto" value="Urheilu" />Urheilu</label>

        <label><input type="checkbox" name="osasto" value="Sisustaminen" />Sisustaminen</label>

        <label><input type="checkbox" name="osasto" value="Pelit" />Pelit</label>

        <label><input type="checkbox" name="osasto" value="Elokuvat" />Elokuvat</label>
      </fieldset>

      <fieldset>
        <legend><label for="maksutapa">Maksutapa</label></legend>
        <select name="maksutapa" id="maksutapa">
          <option value="empty">Valitse</option>
          <option value="sampo">Sampo</option>
          <option value="nordea">Nordea</option>
          <option value="osuuspankki">Osuuspankki</option>
          <option value="aktia">Aktia</option>
        </select>
      </fieldset>
      <fieldset>
        <legend><label for="palautetta">Anna palautetta</label></legend>
        <textarea name="palautetta" id="palautetta" rows="4" placeholder="Kirjoita palautetta"></textarea>
      </fieldset>

      <fieldset>
        <legend>Haluan tilata uutiskirjeen</legend>
        <input type="radio" name="uutiskirje" id="kylla" value="Kylla" />
        <label for="kylla">Kyllä</label>
        <input type="radio" name="uutiskirje" id="ei" value="Ei" />
        <label for="ei">Ei</label>
      </fieldset>

      <fieldset>
        <legend>Olen lukenut ja hyväksyn tuotteiden toimitusehdot</legend>
        <input type="checkbox" name="toimitusehdot" id="ok" value="ok" required />
        <label for="ok">Kyllä</label>
      </fieldset>

      <button type="submit">Lähetä</button>
    </form>
  </section>
</main>
<?php include "footer.php"; ?>