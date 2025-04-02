res = $.ajax({
  type: 'POST',
  url: 'https://tsi-tbd-ale-default-rtdb.firebaseio.com/users.json',
  data: JSON.stringify({
    username: 'John Doe',
    email: 'john@gmail.com'
  }),
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
