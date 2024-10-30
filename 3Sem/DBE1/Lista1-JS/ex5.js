let control = 0
let number = 1
let soma = 0
let media = 0
do {
  soma = soma + number
  media = soma / number
  console.log(number)
  console.log(`soma: ${soma}`)
  console.log(`media: ${media}`)
  number++
  control++
} while (control < 50)
