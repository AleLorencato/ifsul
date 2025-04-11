import { initializeApp } from 'firebase/app'
import { firebaseConfig } from './firebaseConfig.js'
import { child, getDatabase, push, ref, set } from 'firebase/database'

const app = initializeApp(firebaseConfig)
const db = getDatabase()

const data = {
  nome: 'João Freire',
  idade: 19
}

let refNode = ref(db, 'clientes/1')

set(refNode, data)
  .then(() => console.log(`Cliente atualizado com sucesso`))
  .catch(error => console.log('Error: ' + error))
  .finally(() => process.exit(0))
