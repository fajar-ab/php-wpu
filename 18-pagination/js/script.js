
const link = document.getElementsByTagName('link')[0]
link.setAttribute('href', link.getAttribute('href').concat(Math.floor(Math.random()*10)));
