res = $.ajax({
  type: 'POST',
  url: 'https://tsi-tbd-ale-default-rtdb.firebaseio.com/clientes.json',
  data: JSON.stringify([
    {
      nome: 'Maria',
      idade: 15
    },
    {
      nome: 'João',
      idade: 25
    },
    {
      nome: 'Ana',
      idade: 23
    }
  ]),

  contentType: 'application/json',
  dataType: 'json',
  success: function (data) {
    console.log('Success:', data)
  },
  error: function (error) {
    console.log('Error:', error)
  }
})

console.log(res)
