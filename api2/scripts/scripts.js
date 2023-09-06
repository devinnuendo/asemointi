const getScrollbarWidth = () => window.innerWidth - document.documentElement.clientWidth

const body = document.querySelector('body')
body.style.setProperty('--scrollbar-width', `${getScrollbarWidth()}px`)

window.addEventListener('resize', function () {
  body.style.setProperty('--scrollbar-width', `${getScrollbarWidth()}px`)
})

const select1 = document.querySelector('#currency')
const result = document.querySelector('#result')
const amount = document.querySelector('#amount')

const setup = () => {
  // const base = `&from=AED&to=AED&amount=1`
  fetch(`fetch.php?path=EUR`, {
    method: 'GET',
  })
    .then((r) => r.json())
    .then((r) => {
      Object.entries(r.rates).forEach((entry) => {
        const [key, value] = entry
        const option1 = document.createElement('option')
        option1.innerText = key
        select1.append(option1)
      })

      select1.value = 'AED'
      const value = Object.fromEntries(
        Object.entries(r.rates).filter(([item]) => item.includes(select1.value))
      )
      result.innerText = `${amount.value} EUR is ${Object.values(value)} ${select1.value}`
    })
    .catch((error) => console.log(error.message))
}

document.querySelector('#currency').addEventListener('change', (e) => {
  e.preventDefault()
  const to = select1.value
  const amount1 = amount.value
  // const base = `&from=${from}&to=${to}&amount=${amount1}`

  fetch(`fetch.php`, {
    method: 'GET',
  })
    .then((r) => r.json())
    .then((r) => {
      console.log(r)

      const value = Object.fromEntries(
        Object.entries(r.rates).filter(([item]) => item.includes(to))
      )
      result.innerText = `${amount1} EUR is ${Object.values(value) * amount1} ${to}`
    })
    .catch((error) => console.log(error.message))
})

setup()
