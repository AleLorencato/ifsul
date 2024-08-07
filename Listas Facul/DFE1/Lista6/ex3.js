var p = document.getElementsByTagName('p')
window.onload = function () {
  for (i = 0; i < p.length; i++) {
    p[i].style.display = 'block'
  }
}
function OcultarConteudo() {
  for (i = 0; i < p.length; i++) {
    if (p[i].style.display == 'block') {
      p[i].style.display = 'none'
    } else {
      p[i].style.display = 'block'
    }
  }
}
