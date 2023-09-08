<?php
$title = 'Nettikauppaan rekisteröityminen';
$css = 'css/styles-lomake.css';
?>

<?php include "head.php"; ?>

<main>
  <section>
    <div class="container mt-5">
      <form method="POST" class="needs-validation" novalidate>
        <fieldset>
          <legend>Yhteystiedot</legend>
          <div class="mb-3">
            <label for="nimi" class="form-label">Nimi</label>
            <input type="text" name="nimi" id="nimi" class="form-control" placeholder="Nimi" required />
            <div class="invalid-feedback"><i class="fa fa-times" aria-hidden="true"></i> Kirjoita nimi</div>
          </div>

          <div class="mb-3">
            <label for="katuosoite" class="form-label">Katuosoite</label>
            <input type="text" name="katuosoite" id="katuosoite" class="form-control" placeholder="Katuosoite" />
          </div>

          <div class="mb-3">
            <label for="postinumero" class="form-label">Postinumero</label>
            <input type="number" name="postinumero" id="postinumero" class="form-control" placeholder="Postinumero" />
          </div>

          <div class="mb-3">
            <label for="postitoimipaikka" class="form-label">Postitoimipaikka</label>
            <input type="text" name="postitoimipaikka" id="postitoimipaikka" class="form-control" placeholder="Postitoimipaikka" />
          </div>

          <div class="mb-3">
            <label for="puhelinnumero" class="form-label">Puhelinnumero</label>
            <input type="tel" name="puhelinnumero" id="puhelinnumero" class="form-control" placeholder="Puhelinnumero" pattern="^[\d]{7,15}$" required />
            <div class="invalid-feedback"><i class="fa fa-times" aria-hidden="true"></i> Kirjoita puhelinnumero</div>
          </div>

          <div class="mb-3">
            <label for="sahkopostiosoite" class="form-label">Sähköpostiosoite</label>
            <input type="email" name="sahkopostiosoite" id="sahkopostiosoite" class="form-control" placeholder="Sähköpostiosoite" minlength="12" required />
            <div class="invalid-feedback"><i class="fa fa-times" aria-hidden="true"></i> Kirjoita sähköpostiosoite</div>
          </div>

          <div class="mb-3">
            <label for="salasana" class="form-label">Salasana</label>
            <input type="password" name="salasana" id="salasana" class="form-control" placeholder="Salasana" required />
            <div class="invalid-feedback"><i class="fa fa-times" aria-hidden="true"></i> Kirjoita salasana</div>
          </div>
        </fieldset>

        <fieldset class="osastot">
          <legend>Mistä osastoista olet kiinnostunut?</legend>
          <div class="form-check">
            <input type="checkbox" name="osasto" value="Muoti" class="form-check-input" id="osasto-muoti" />
            <label class="form-check-label" for="osasto-muoti">Muoti</label>
          </div>
          <div class="form-check">
            <input type="checkbox" name="osasto" value="Urheilu" class="form-check-input" id="osasto-urheilu" />
            <label class="form-check-label" for="osasto-urheilu">Urheilu</label>
          </div>
          <div class="form-check">
            <input type="checkbox" name="osasto" value="Sisustaminen" class="form-check-input" id="osasto-sisustaminen" />
            <label class="form-check-label" for="osasto-sisustaminen">Sisustaminen</label>
          </div>
          <div class="form-check">
            <input type="checkbox" name="osasto" value="Pelit" class="form-check-input" id="osasto-pelit" />
            <label class="form-check-label" for="osasto-pelit">Pelit</label>
          </div>
          <div class="form-check">
            <input type="checkbox" name="osasto" value="Elokuvat" class="form-check-input" id="osasto-elokuvat" />
            <label class="form-check-label" for="osasto-elokuvat">Elokuvat</label>
          </div>
        </fieldset>

        <fieldset>
          <legend>Maksutapa</legend>
          <div class="mb-3">
            <label for="maksutapa" class="form-label">Valitse maksutapa</label>
            <select name="maksutapa" id="maksutapa" class="form-select">
              <option value="empty">Valitse</option>
              <option value="sampo">Sampo</option>
              <option value="nordea">Nordea</option>
              <option value="osuuspankki">Osuuspankki</option>
              <option value="aktia">Aktia</option>
            </select>
          </div>
        </fieldset>

        <fieldset>
          <legend>Anna palautetta</legend>
          <div class="mb-3">
            <label for="palautetta" class="form-label">Kirjoita palautetta</label>
            <textarea name="palautetta" id="palautetta" rows="4" class="form-control" placeholder="Kirjoita palautetta"></textarea>
          </div>
        </fieldset>

        <fieldset>
          <legend>Haluan tilata uutiskirjeen</legend>
          <div class="form-check">
            <input type="radio" name="uutiskirje" id="kylla" value="Kylla" class="form-check-input" />
            <label class="form-check-label" for="kylla">Kyllä</label>
          </div>
          <div class="form-check">
            <input type="radio" name="uutiskirje" id="ei" value="Ei" class="form-check-input" />
            <label class="form-check-label" for="ei">Ei</label>
          </div>
        </fieldset>

        <fieldset>
          <legend>Hyväksyn tuotteiden toimitusehdot</legend>
          <div class="form-check">
            <input type="checkbox" name="toimitusehdot" id="ok" value="ok" class="form-check-input" required />
            <label class="form-check-label" for="ok">Hyväksyn toimitusehdot</label>
            <div class="invalid-feedback"><i class="fa fa-times" aria-hidden="true"></i> Hyväksy toimitusehdot</div>
          </div>
        </fieldset>

        <button type="submit" class="btn btn-primary">Lähetä</button>
      </form>
    </div>

  </section>
</main>

<script>
  (function() {
    'use strict';
    var forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(function(form) {
      form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  })();
</script>

<?php include "footer.php"; ?>