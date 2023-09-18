// const menutoggle = () => {
//   var x = document.querySelector('#main-nav')
//   x.className = x.className === '' ? 'open' : ''
// }
document.querySelector('#menu-toggle').addEventListener('click', function () {
  const x = document.querySelector('#menu-toggle')
  x.attributes['aria-expanded'].value === 'true'
    ? (x.attributes['aria-expanded'].value = 'false')
    : (x.attributes['aria-expanded'].value = 'true')
})

document.querySelector('#submenu-toggle').addEventListener('click', function () {
  const x = document.querySelector('#submenu-toggle')
  x.attributes['aria-expanded'].value === 'true'
    ? (x.attributes['aria-expanded'].value = 'false')
    : (x.attributes['aria-expanded'].value = 'true')
})

const getScrollbarWidth = () => window.innerWidth - document.documentElement.clientWidth

getScrollbarWidth()

const body = document.querySelector('body')
body.style.setProperty('--scrollbar-width', `${getScrollbarWidth()}px`)

window.addEventListener('resize', function (event) {
  body.style.setProperty(
    '--scrollbar-width',
    `${getScrollbarWidth() ? getScrollbarWidth() : 0}px`
  )
  /* close menu on resize */
  document.getElementById('menu-toggle').checked = false
  document.getElementById('submenu-toggle').checked = false
  document.querySelector('#menu-toggle').attributes['aria-expanded'].value = 'false'
  document.querySelector('#submenu-toggle').attributes['aria-expanded'].value = 'false'
})

window.addEventListener('click', function (e) {
  /* close menu on outside menu click */
  if (!document.getElementById('mainmenu').contains(e.target)) {
    document.getElementById('menu-toggle').checked = false
    document.getElementById('submenu-toggle').checked = false
    document.querySelector('#menu-toggle').attributes['aria-expanded'].value = 'false'
    document.querySelector('#submenu-toggle').attributes['aria-expanded'].value = 'false'
  }
})
