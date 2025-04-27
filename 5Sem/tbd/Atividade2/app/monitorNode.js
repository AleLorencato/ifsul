import * as fb from 'firebase/database' // sera preciso usar fb antes de cada funcao
import { dbConnect } from './connetToFB.js'

dbConnect()
  .then(db => {
    //db contem a referencia ao banco
    console.log(db) //mostra informacoes da conexao(pode excluir)
    const dbRef = fb.ref(db, 'produtos')
    fb.onChildChanged(
      dbRef,
      snapshot => {
        if (snapshot.exists()) {
          console.log(snapshot.val())
          if (snapshot.key === '-MwSzyJMlNDToTGtPuhc') {
            fb.off(dbRef, 'child_changed')
            console.log('Desconectado do monitoramento de alterações')
          }
        } else {
          console.log('Não há dados disponíveis')
        }
      },
      { onlyOnce: false }
    )
  })
  .catch(err => console.log(err))
