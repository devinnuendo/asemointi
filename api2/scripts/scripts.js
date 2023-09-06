const getScrollbarWidth = () => window.innerWidth - document.documentElement.clientWidth

const body = document.querySelector('body')
body.style.setProperty('--scrollbar-width', `${getScrollbarWidth()}px`)

window.addEventListener('resize', function () {
  body.style.setProperty('--scrollbar-width', `${getScrollbarWidth()}px`)
})

const select1 = document.querySelector('#currency1')
const select2 = document.querySelector('#currency2')
const result = document.querySelector('#result')

const setup = () => {
  const base = '&from=AED&to=AED&amount=1'
  fetch(`fetch.php?base=${base}`, {
    method: 'GET',
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
      result.innerText = `1 ${select1.value} is ${Object.values(value)} ${select2.value}`
    })
    .catch((error) => console.log(error.message))
}

document.querySelector('form').addEventListener('submit', (e) => {
  e.preventDefault()
  const data = Object.fromEntries(new FormData(e.target).entries())
  const from = data.currency1
  const to = data.currency2
  const amount = data.amount
  base = `&from=${from}&to=${to}&amount=${amount}`

  fetch(`fetch.php?base=${base}`, {
    method: 'GET',
  })
    .then((r) => r.json())
    .then((r) => {
      const value = Object.fromEntries(
        Object.entries(r.rates).filter(([item]) => item.includes(to))
      )
      result.innerText = `${amount} ${from} is ${Object.values(value) * amount} ${to}`
    })
    .catch((error) => console.log(error.message))
})

setup()
