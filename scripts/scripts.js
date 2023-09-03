const menutoggle = () => {
  var x = document.querySelector('#main-nav')
  x.className = x.className === '' ? 'open' : ''
}

const getScrollbarWidth = () => window.innerWidth - document.documentElement.clientWidth

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
})

window.addEventListener('click', function (e) {
  /* close menu on outside menu click */
  if (!document.getElementById('mainmenu').contains(e.target)) {
    document.getElementById('menu-toggle').checked = false
    document.getElementById('submenu-toggle').checked = false
  }
})
