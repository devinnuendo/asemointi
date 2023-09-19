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
    terms: {
      puuttuu: 'Hyväksy käyttösäännöt',
    },
  }

  const error = (field, property) => {
    return errors[field][property]
  }

  const input = document.querySelectorAll('input')
  input.forEach((x) =>
    x.addEventListener('blur', (e) => {
      const isValid = e.target.checkValidity()
      // Ks. css-tiedosto styles-lomake.css luokka .invalid -asetukset
      !isValid ? e.target.classList.add('invalid') : e.target.classList.remove('invalid')
      !isValid
        ? e.target.setAttribute('aria-invalid', !isValid)
        : e.target.removeAttribute('aria-invalid')

      if (e.target.validity.tooShort) {
        e.target.nextElementSibling.innerText = error(e.target.id, 'lyhyt')
      } else if (e.target.validity.valueMissing) {
        if (e.target.id === 'terms')
          e.target.nextElementSibling.nextElementSibling.innerText = error(
            e.target.id,
            'puuttuu'
          )
        else e.target.nextElementSibling.innerText = error(e.target.id, 'puuttuu')
      } else if (e.target.validity.typeMismatch) {
        e.target.nextElementSibling.innerText = error(e.target.id, 'oikein')
      }
    })
  )

  // Vielä erikseen terms-kentälle validointitarkistus, jottei tarvitse odottaa blurria poistamaan virheviesti näkyvistä.
  document.querySelector('#terms').addEventListener('click', (e) => {
    const isValid = e.target.checkValidity()
    !isValid ? e.target.classList.add('invalid') : e.target.classList.remove('invalid')
    !isValid
      ? e.target.setAttribute('aria-invalid', !isValid)
      : e.target.removeAttribute('aria-invalid')

    if (e.target.validity.valueMissing) {
      e.target.nextElementSibling.nextElementSibling.innerText = error(
        e.target.id,
        'puuttuu'
      )
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

  document.getElementById('registration-form').onsubmit = checkPasswords
})
