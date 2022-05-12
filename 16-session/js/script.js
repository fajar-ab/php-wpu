
const click = document.getElementById('hapus');

const link = document.getElementsByTagName('link')[0];
link.setAttribute('href', link.getAttribute('href').concat(`?version=${Math.floor(Math.random()*10)}`));
