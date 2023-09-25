document.addEventListener('DOMContentLoaded', () => {
  const language = document.documentElement.lang

  const error = (field, property, language = 'fi') => {
    if (
      errors[field] &&
      errors[field][language] &&
      errors[field][language][property] !== undefined
    ) {
      return errors[field][language][property]
    } else {
      return errors['general'][language]['puuttuu']
    }
  }

  const eventList = ['blur', 'change']

  const input = document.querySelectorAll('input, select, textarea')

  input.forEach((x) => {
    for (ev of eventList) {
      x.addEventListener(ev, (e) => {
        if (!e.target.hasAttribute('required')) {
          return
        }

        const isValid = e.target.checkValidity()
        // Ks. css-tiedosto styles-lomake.css .invalid -asetukset
        !isValid
          ? e.target.classList.add('invalid')
          : e.target.classList.remove('invalid')
        !isValid
          ? e.target.setAttribute('aria-invalid', !isValid)
          : e.target.removeAttribute('aria-invalid')

        if (!errors[e.target.id]) {
          e.target.nextElementSibling.innerText = error('general', 'puuttuu', language)
          return
        }

        if (e.target.validity.tooShort) {
          e.target.nextElementSibling.innerText = error(e.target.id, 'lyhyt', language)
        } else if (e.target.validity.valueMissing) {
          if (e.target.type === 'checkbox')
            e.target.parentElement.querySelector('.error').innerText = error(
              e.target.id,
              'puuttuu',
              language
            )
          else
            e.target.nextElementSibling.innerText = error(
              e.target.id,
              'puuttuu',
              language
            )
        } else if (e.target.validity.tooLong) {
          e.target.nextElementSibling.innerText = error(e.target.id, 'pitka', language)
        } else if (e.target.validity.typeMismatch || e.target.validity.patternMismatch) {
          e.target.nextElementSibling.innerText = error(e.target.id, 'oikein', language)
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
      x.innerText = error('password2', 'tasmaa', language)
      x.addEventListener('blur', () => x.classList.remove('block'))

      return false // Prevent form submission
    }
    return true // Allow form submission
  }

  const registrationForm = document.getElementById('registration-form')
  if (registrationForm) registrationForm.onsubmit = checkPasswords

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
      sv: {
        puuttuu: 'Förnamn saknas',
        lyhyt: 'Förnamn är för kort',
        oikein: 'Ange förnamn i rätt form',
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
      sv: {
        puuttuu: 'Efternamn saknas',
        lyhyt: 'Efternamn är för kort',
        oikein: 'Ange efternamn i rätt form',
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
      sv: {
        puuttuu: 'Telefonnummer saknas',
        lyhyt: 'Telefonnummer är för kort',
        pitka: 'Telefonnummer är för långt',
        oikein: 'Ange telefonnummer utan specialtecken',
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
      sv: {
        puuttuu: 'E-postadress saknas',
        oikein: 'Ange en giltig e-postadress',
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
      sv: {
        puuttuu: 'Lösenord saknas',
        lyhyt: 'Lösenordet är för kort',
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
      sv: {
        puuttuu: 'Lösenord saknas',
        lyhyt: 'Lösenordet är för kort',
        tasmaa: 'Lösenorden matchar inte',
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
      sv: {
        puuttuu: 'Mottagarens namn saknas',
        lyhyt: 'Mottagarens namn är för kort',
        oikein: 'Ange mottagarens namn i rätt form',
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
      sv: {
        puuttuu: 'Gatuadress saknas',
        lyhyt: 'Gatuadressen är för kort',
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
      sv: {
        puuttuu: 'Postnummer saknas',
        lyhyt: 'Postnumret är för kort',
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
      sv: {
        puuttuu: 'Stad saknas',
        lyhyt: 'Staden är för kort',
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
      sv: {
        puuttuu: 'Mottagarens namn saknas',
        lyhyt: 'Mottagarens namn är för kort',
        oikein: 'Ange mottagarens namn i rätt form',
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
      sv: {
        puuttuu: 'Gatuadress saknas',
        lyhyt: 'Gatuadressen är för kort',
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
      sv: {
        puuttuu: 'Postnummer saknas',
        lyhyt: 'Postnumret är för kort',
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
      sv: {
        puuttuu: 'Stad saknas',
        lyhyt: 'Staden är för kort',
      },
    },
    payment_method: {
      fi: {
        puuttuu: 'Valitse maksutapa',
      },
      en: {
        puuttuu: 'Select a payment method',
      },
      sv: {
        puuttuu: 'Välj betalningssätt',
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
      sv: {
        puuttuu: 'Kortnummer saknas',
        lyhyt: 'Kortnumret är för kort',
        oikein: 'Ange kortnummer i rätt form',
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
      sv: {
        puuttuu: 'Kortets giltighetstid saknas',
        oikein: 'Ange giltighetstid i rätt form: MM/YY',
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
      sv: {
        puuttuu: 'Namn saknas',
        lyhyt: 'Namnet är för kort',
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
      sv: {
        puuttuu: 'Ämne saknas',
        lyhyt: 'Ämnet är för kort',
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
      sv: {
        puuttuu: 'Meddelande saknas',
        lyhyt: 'Meddelandet är för kort',
      },
    },
    terms: {
      fi: {
        puuttuu: 'Hyväksy käyttösäännöt',
      },
      en: {
        puuttuu: 'Accept the terms and conditions',
      },
      sv: {
        puuttuu: 'Godkänn användningsreglerna',
      },
    },
    general: {
      fi: {
        puuttuu: 'Kenttä on pakollinen',
      },
      en: {
        puuttuu: 'Field is required',
      },
      sv: {
        puuttuu: 'Fältet är obligatoriskt',
      },
    },
  }
})
