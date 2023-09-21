document.addEventListener('DOMContentLoaded', () => {
  const errors = {
    first_name: {
      puuttuu: 'Etunimi puuttuu',
      lyhyt: 'Etunimi on liian lyhyt',
      oikein: 'Anna etunimi oikeassa muodossa',
    },
    last_name: {
      puuttuu: 'Sukunimi puuttuu',
      lyhyt: 'Sukunimi on liian lyhyt',
      oikein: 'Anna sukunimi oikeassa muodossa',
    },
    phone: {
      puuttuu: 'Puhelinnumero puuttuu',
      lyhyt: 'Puhelinnumero on liian lyhyt',
      pitka: 'Puhelinnumero on liian pitkä',
      oikein: 'Anna puhelinnumero oikeassa muodossa ilman erikoismerkkejä',
    },
    email: {
      puuttuu: 'Sähköpostiosoite puuttuu',
      oikein: 'Anna sähköpostiosoite oikeassa muodossa',
    },
    password: {
      puuttuu: 'Salasana puuttuu',
      lyhyt: 'Salasana on liian lyhyt',
    },
    password2: {
      puuttuu: 'Salasana puuttuu',
      lyhyt: 'Salasana on liian lyhyt',
      tasmaa: 'Salasanat eivät täsmää',
    },
    recipient_name: {
      puuttuu: 'Vastaanottajan nimi puuttuu',
      lyhyt: 'Vastaanottajan nimi on liian lyhyt',
      oikein: 'Anna vastaanottajan nimi oikeassa muodossa',
    },
    street_address: {
      puuttuu: 'Katuosoite puuttuu',
      lyhyt: 'Katuosoite on liian lyhyt',
    },
    postal_code: {
      puuttuu: 'Postinumero puuttuu',
      lyhyt: 'Postinumero on liian lyhyt',
    },
    city: {
      puuttuu: 'Kaupunki puuttuu',
      lyhyt: 'Kaupunki on liian lyhyt',
    },
    billing_name: {
      puuttuu: 'Laskutuksen saaja puuttuu',
      lyhyt: 'Laskutuksen saaja on liian lyhyt',
      oikein: 'Anna laskutuksen saaja oikeassa muodossa',
    },
    billing_street_address: {
      puuttuu: 'Laskutusosoite puuttuu',
      lyhyt: 'Laskutusosoite on liian lyhyt',
    },
    billing_postal_code: {
      puuttuu: 'Laskutusosoitteen postinumero puuttuu',
      lyhyt: 'Laskutusosoitteen postinumero on liian lyhyt',
    },
    billing_city: {
      puuttuu: 'Laskutusosoitteen kaupunki puuttuu',
      lyhyt: 'Laskutusosoitteen kaupunki on liian lyhyt',
    },
    payment_method: {
      puuttuu: 'Valitse maksutapa',
    },
    card_number: {
      puuttuu: 'Kortin numero puuttuu',
      lyhyt: 'Kortin numero on liian lyhyt',
      oikein: 'Anna kortin numero oikeassa muodossa',
    },
    expiration_date: {
      puuttuu: 'Kortin voimassaoloaika puuttuu',
      oikein: 'Anna voimassaoloaika oikeassa muodossa: KK/VV',
    },
    name: {
      puuttuu: 'Nimi puuttuu',
      lyhyt: 'Nimi on liian lyhyt',
    },
    subject: {
      puuttuu: 'Aihe puuttuu',
      lyhyt: 'Aihe on liian lyhyt',
    },
    message: {
      puuttuu: 'Viesti puuttuu',
      lyhyt: 'Viesti on liian lyhyt',
    },
    terms: {
      puuttuu: 'Hyväksy käyttösäännöt',
    },
  }

  const error = (field, property) => {
    return errors[field][property]
  }

  const eventList = ['blur', 'change']

  const input = document.querySelectorAll('input, select, textarea')

  input.forEach((x) => {
    for (ev of eventList) {
      x.addEventListener(ev, (e) => {
        const isValid = e.target.checkValidity()
        // Ks. css-tiedosto styles-lomake.css .invalid -asetukset
        !isValid
          ? e.target.classList.add('invalid')
          : e.target.classList.remove('invalid')
        !isValid
          ? e.target.setAttribute('aria-invalid', !isValid)
          : e.target.removeAttribute('aria-invalid')

        if (e.target.validity.tooShort) {
          e.target.nextElementSibling.innerText = error(e.target.id, 'lyhyt')
        } else if (e.target.validity.valueMissing) {
          if (e.target.type === 'checkbox')
            e.target.parentElement.querySelector('.error').innerText = error(
              e.target.id,
              'puuttuu'
            )
          else e.target.nextElementSibling.innerText = error(e.target.id, 'puuttuu')
        } else if (e.target.validity.tooLong) {
          e.target.nextElementSibling.innerText = error(e.target.id, 'pitka')
        } else if (e.target.validity.typeMismatch || e.target.validity.patternMismatch) {
          e.target.nextElementSibling.innerText = error(e.target.id, 'oikein')
        }
      })
    }
  })

  function checkPasswords() {
    var password1 = document.getElementById('password').value
    var password2 = document.getElementById('password2').value

    if (password1 !== password2) {
      const x = document.querySelector('.password-match')
      x.classList.add('block')
      x.innerText = error('password2', 'tasmaa')
      x.addEventListener('blur', () => x.classList.remove('block'))

      return false // Prevent form submission
    }
    return true // Allow form submission
  }

  const registrationForm = document.getElementById('registration-form')
  if (registrationForm) registrationForm.onsubmit = checkPasswords
})
