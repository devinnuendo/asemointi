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

document.querySelectorAll('.submenu-toggle').forEach((s) => {
  s.addEventListener('click', function () {
    document.querySelectorAll('.submenu-toggle').forEach((x) => {
      x.attributes['aria-expanded'].value === 'true'
        ? (x.attributes['aria-expanded'].value = 'false')
        : (x.attributes['aria-expanded'].value = 'true')
    })
  })
})

// close main menu when user menu is opened
document.querySelector('.user .submenu-toggle').addEventListener('click', function () {
  document.getElementById('menu-toggle').checked = false
})

// close user menu when main menu is opened
document.querySelector('#menu-toggle').addEventListener('click', function () {
  document.querySelector('.user .submenu-toggle').checked = false
})

const getScrollbarWidth = () => window.innerWidth - document.documentElement.clientWidth

getScrollbarWidth()

const body = document.querySelector('body')
body.style.setProperty('--scrollbar-width', `${getScrollbarWidth()}px`)

window.addEventListener('resize', function () {
  body.style.setProperty(
    '--scrollbar-width',
    `${getScrollbarWidth() ? getScrollbarWidth() : 0}px`
  )
  /* close menus on resize */
  document.getElementById('menu-toggle').checked = false
  document.querySelectorAll('.submenu-toggle').forEach((x) => (x.checked = false))
  document.querySelector('#menu-toggle').attributes['aria-expanded'].value = 'false'
  document.querySelectorAll('.submenu-toggle').forEach((x) => {
    x.attributes['aria-expanded'].value = 'false'
  })
})

window.addEventListener('click', function (e) {
  /* close menus on outside menu click */
  if (!document.getElementById('mainmenu').contains(e.target)) {
    document.getElementById('menu-toggle').checked = false
    document.querySelectorAll('.submenu-toggle').forEach((x) => (x.checked = false))
    document.querySelector('#menu-toggle').attributes['aria-expanded'].value = 'false'
    document.querySelectorAll('.submenu-toggle').forEach((x) => {
      x.attributes['aria-expanded'].value = 'false'
    })
  }
})
