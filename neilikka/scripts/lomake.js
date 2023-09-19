document.addEventListener('DOMContentLoaded', () => {
  const input = document.querySelectorAll('input')
  input.forEach((x) =>
    x.addEventListener('blur', (e) => {
      const isValid = e.target.checkValidity()
      !isValid ? e.target.classList.add('invalid') : e.target.classList.remove('invalid')
      !isValid
        ? e.target.setAttribute('aria-invalid', !isValid)
        : e.target.removeAttribute('aria-invalid')
    })
  )

  function checkPasswords() {
    var password1 = document.getElementById('password').value
    var password2 = document.getElementById('password2').value

    if (password1 !== password2) {
      const x = document.querySelector('.password-match')
      x.classList.add('block')
      x.addEventListener('blur', () => x.classList.remove('block'))

      return false // Prevent form submission
    }
    return true // Allow form submission
  }

  document.getElementById('registration-form').onsubmit = checkPasswords
})
