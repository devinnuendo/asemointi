const menutoggle = () => {
  var x = document.querySelector('#main-nav')
  x.className = x.className === 'main-nav' ? 'open main-nav' : 'main-nav'
}
window.addEventListener('resize', function (event) {
  /* close menu on resize */
  document.querySelector('#main-nav').className = 'main-nav'
})

window.addEventListener('click', function (e) {
  /* close menu on outside menu click */
  if (!document.querySelector('#main-nav').contains(e.target)) {
    document.querySelector('#main-nav').className = 'main-nav'
  }
})
