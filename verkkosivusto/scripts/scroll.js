window.onscroll = () => {
  //load content when scroll reaches bottom
  if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 10) {
    load()
  }
}

let url = './posts.php'
let counter = 1
const quantity = 25
document.addEventListener('DOMContentLoaded', load)

function load() {
  // Set start and end post numbers, and update counter
  const start = counter
  const end = start + quantity - 1
  counter = end + 1
  // Get new posts and add posts
  fetch(`${url}?start=${start}&end=${end}`)
    .then((response) => response.json())
    .then((data) => {
      data.posts.forEach(add_post)
    })
}

const add_post = (contents) => {
  const post = document.createElement('article')
  const header = document.createElement('header')
  const title = document.createElement('h2')
  const p = document.createElement('p')
  title.innerText = contents.title
  p.innerText = contents.content
  header.append(title)
  post.append(header)
  post.append(p)
  document.querySelector('#posts').append(post)
}
