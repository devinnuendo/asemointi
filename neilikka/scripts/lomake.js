document.addEventListener('DOMContentLoaded', () => {
  const errors = {
    first_name: {
      fi: {
        puuttuu: 'Etunimi puuttuu',
        lyhyt: 'Etunimi on liian lyhyt',
        oikein: 'Anna etunimi oikeassa muodossa',
      },
      en: {
        puuttuu: 'First name missing',
        lyhyt: 'First name too short',
        oikein: 'Give first name in correct form',
      },
    },
    last_name: {
      fi: {
        puuttuu: 'Sukunimi puuttuu',
        lyhyt: 'Sukunimi on liian lyhyt',
        oikein: 'Anna sukunimi oikeassa muodossa',
      },
      en: {
        puuttuu: 'Last name missing',
        lyhyt: 'Last name too short',
        oikein: 'Give last name in correct form',
      },
    },
    phone: {
      fi: {
        puuttuu: 'Puhelinnumero puuttuu',
        lyhyt: 'Puhelinnumero on liian lyhyt',
        pitka: 'Puhelinnumero on liian pitkä',
        oikein: 'Anna puhelinnumero ilman erikoismerkkejä',
      },
      en: {
        puuttuu: 'Phone number missing',
        lyhyt: 'Phone number too short',
        pitka: 'Phone number too long',
        oikein: 'Provide a phone number without special characters',
      },
    },
    email: {
      fi: {
        puuttuu: 'Sähköpostiosoite puuttuu',
        oikein: 'Anna sähköpostiosoite oikeassa muodossa',
      },
      en: {
        puuttuu: 'Email address missing',
        oikein: 'Provide a valid email address',
      },
    },
    password: {
      fi: {
        puuttuu: 'Salasana puuttuu',
        lyhyt: 'Salasana on liian lyhyt',
      },
      en: {
        puuttuu: 'Password missing',
        lyhyt: 'Password too short',
      },
    },
    password2: {
      fi: {
        puuttuu: 'Salasana puuttuu',
        lyhyt: 'Salasana on liian lyhyt',
        tasmaa: 'Salasanat eivät täsmää',
      },
      en: {
        puuttuu: 'Password missing',
        lyhyt: 'Password too short',
        tasmaa: 'Passwords do not match',
      },
    },
    recipient_name: {
      fi: {
        puuttuu: 'Vastaanottajan nimi puuttuu',
        lyhyt: 'Vastaanottajan nimi on liian lyhyt',
        oikein: 'Anna vastaanottajan nimi oikeassa muodossa',
      },
      en: {
        puuttuu: 'Recipient name missing',
        lyhyt: 'Recipient name too short',
        oikein: 'Provide recipient name in correct form',
      },
    },
    street_address: {
      fi: {
        puuttuu: 'Katuosoite puuttuu',
        lyhyt: 'Katuosoite on liian lyhyt',
      },
      en: {
        puuttuu: 'Street address missing',
        lyhyt: 'Street address too short',
      },
    },
    postal_code: {
      fi: {
        puuttuu: 'Postinumero puuttuu',
        lyhyt: 'Postinumero on liian lyhyt',
      },
      en: {
        puuttuu: 'Postal code missing',
        lyhyt: 'Postal code too short',
      },
    },
    city: {
      fi: {
        puuttuu: 'Kaupunki puuttuu',
        lyhyt: 'Kaupunki on liian lyhyt',
      },
      en: {
        puuttuu: 'City missing',
        lyhyt: 'City too short',
      },
    },
    billing_name: {
      fi: {
        puuttuu: 'Laskutuksen saaja puuttuu',
        lyhyt: 'Laskutuksen saaja on liian lyhyt',
        oikein: 'Anna laskutuksen saaja oikeassa muodossa',
      },
      en: {
        puuttuu: 'Billing recipient name missing',
        lyhyt: 'Billing recipient name too short',
        oikein: 'Provide billing recipient name in correct form',
      },
    },
    billing_street_address: {
      fi: {
        puuttuu: 'Laskutusosoite puuttuu',
        lyhyt: 'Laskutusosoite on liian lyhyt',
      },
      en: {
        puuttuu: 'Billing street address missing',
        lyhyt: 'Billing street address too short',
      },
    },
    billing_postal_code: {
      fi: {
        puuttuu: 'Laskutusosoitteen postinumero puuttuu',
        lyhyt: 'Laskutusosoitteen postinumero on liian lyhyt',
      },
      en: {
        puuttuu: 'Billing postal code missing',
        lyhyt: 'Billing postal code too short',
      },
    },
    billing_city: {
      fi: {
        puuttuu: 'Laskutusosoitteen kaupunki puuttuu',
        lyhyt: 'Laskutusosoitteen kaupunki on liian lyhyt',
      },
      en: {
        puuttuu: 'Billing city missing',
        lyhyt: 'Billing city too short',
      },
    },
    payment_method: {
      fi: {
        puuttuu: 'Valitse maksutapa',
      },
      en: {
        puuttuu: 'Select a payment method',
      },
    },
    card_number: {
      fi: {
        puuttuu: 'Kortin numero puuttuu',
        lyhyt: 'Kortin numero on liian lyhyt',
        oikein: 'Anna kortin numero oikeassa muodossa',
      },
      en: {
        puuttuu: 'Card number missing',
        lyhyt: 'Card number too short',
        oikein: 'Provide card number in correct form',
      },
    },
    expiration_date: {
      fi: {
        puuttuu: 'Kortin voimassaoloaika puuttuu',
        oikein: 'Anna voimassaoloaika oikeassa muodossa: KK/VV',
      },
      en: {
        puuttuu: 'Expiration date missing',
        oikein: 'Provide expiration date in correct form: MM/YY',
      },
    },
    name: {
      fi: {
        puuttuu: 'Nimi puuttuu',
        lyhyt: 'Nimi on liian lyhyt',
      },
      en: {
        puuttuu: 'Name missing',
        lyhyt: 'Name too short',
      },
    },
    subject: {
      fi: {
        puuttuu: 'Aihe puuttuu',
        lyhyt: 'Aihe on liian lyhyt',
      },
      en: {
        puuttuu: 'Subject missing',
        lyhyt: 'Subject too short',
      },
    },
    message: {
      fi: {
        puuttuu: 'Viesti puuttuu',
        lyhyt: 'Viesti on liian lyhyt',
      },
      en: {
        puuttuu: 'Message missing',
        lyhyt: 'Message too short',
      },
    },
    terms: {
      fi: {
        puuttuu: 'Hyväksy käyttösäännöt',
      },
      en: {
        puuttuu: 'Accept the terms and conditions',
      },
    },
  }

  const error = (field, property, language = 'fi') => {
    return errors[field][language][property]
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
