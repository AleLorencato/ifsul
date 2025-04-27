import * as fb from 'firebase/database' // sera preciso usar fb antes de cada funcao
import { dbConnect } from './connetToFB.js'

dbConnect()
  .then(db => {
    //db contem a referencia ao banco
    console.log(db) //mostra informacoes da conexao(pode excluir)
    const dbRef = fb.ref(db, 'produtos')
    const result = fb.query(dbRef, fb.orderByChild('preco'))
    fb.get(result)
      .then(snapshot => {
        if (snapshot.exists()) {
          const data = snapshot.val()
          const orderedData = Object.entries(data)
            .map(([key, value]) => ({
              id: key,
              ...value
            }))
            .sort((a, b) => a.preco - b.preco)

          orderedData.forEach(item => {
            console.log(item)
          })
          process.exit(0)
        } else {
          console.log('Não há dados disponíveis')
          process.exit(0)
        }
      })
      .catch(error => {
        console.error('Erro ao buscar dados:', error)
        process.exit(1)
      })
  })
  .catch(err => console.log(err))

// tive que colocar uma regra de index no firebase para conseguir ordenar por preco
//     "produtos": { ".indexOn": ["preco"] }
