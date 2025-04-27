import * as fb from 'firebase/database' // sera preciso usar fb antes de cada funcao
import { dbConnect } from './connetToFB.js'

dbConnect()
  .then(db => {
    //db contem a referencia ao banco
    console.log(db) //mostra informacoes da conexao(pode excluir)
    const dbRef = fb.ref(db, 'produtos')
    const result = fb.query(dbRef, fb.orderByKey())
    fb.onValue(result, snapshot => {
      let data = Object.entries(snapshot.val())
      let invert = Object.fromEntries(data.reverse())
      if (snapshot.exists()) {
        console.log(invert)
        process.exit(0)
      } else {
        console.log('Não há dados disponíveis')
        process.exit(0)
      }
    })
  })
  .catch(err => console.log(err))
