function MudarCor() {
  var p = document.getElementsByTagName('p')
  for (i = 0; i < p.length; i++) {
    if (i % 2 == 0) {
      p[i].style.color = 'blue'
    } else {
      p[i].style.color = 'red'
    }
  }
}
