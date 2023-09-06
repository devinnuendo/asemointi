const getScrollbarWidth = () => window.innerWidth - document.documentElement.clientWidth

const body = document.querySelector('body')
body.style.setProperty('--scrollbar-width', `${getScrollbarWidth()}px`)

window.addEventListener('resize', function () {
  body.style.setProperty('--scrollbar-width', `${getScrollbarWidth()}px`)
})

const select1 = document.querySelector('#currency1')
const select2 = document.querySelector('#currency2')
const result = document.querySelector('#result')

const setup = (currency = 'EUR') => {
  fetch(`https://open.er-api.com/v6/latest/${currency}`, {
    method: 'GET',
    redirect: 'follow',
  })
    .then((r) => r.json())
    .then((r) => {
      Object.entries(r.rates).forEach((entry) => {
        const [key, value] = entry
        const option1 = document.createElement('option')
        option1.innerText = key
        select1.append(option1)
        const option2 = document.createElement('option')
        option2.innerText = key
        select2.append(option2)
      })
      const value = Object.fromEntries(
        Object.entries(r.rates).filter(([item]) => item.includes(select2.value))
      )
      result.innerText = `1 ${currency} is ${Object.values(value)} ${select2.value}`
    })
    .catch((error) => console.log(error.message))
}

document.querySelector('form').addEventListener('submit', (e) => {
  e.preventDefault()
  const data = Object.fromEntries(new FormData(e.target).entries())
  const currency1 = data.currency1
  const currency2 = data.currency2
  const amount = data.amount

  fetch(`https://open.er-api.com/v6/latest/${currency1}`, {
    method: 'GET',
    redirect: 'follow',
  })
    .then((r) => r.json())
    .then((r) => {
      const value = Object.fromEntries(
        Object.entries(r.rates).filter(([item]) => item.includes(currency2))
      )
      result.innerText = `${amount} ${currency1} is ${
        Object.values(value) * amount
      } ${currency2}`
    })
    .catch((error) => console.log(error.message))
})

setup()
