function MudarConteudo() {
  let p = document.getElementsByTagName('p')
  for (i = 0; i < p.length; i++) {
    p[i].textContent = `Parágrafo ${i}`
  }
}
