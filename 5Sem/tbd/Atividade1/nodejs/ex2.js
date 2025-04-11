import { initializeApp } from 'firebase/app'
import { firebaseConfig } from './firebaseConfig.js'
import { child, getDatabase, push, ref, set } from 'firebase/database'

const app = initializeApp(firebaseConfig)
const db = getDatabase()

let refNode = ref(db, 'clientes/0')
let refAttr = child(refNode, 'nome')
set(refAttr, 'Maria dos Anjos')
  .then(() => console.log(`Cliente atualizado com sucesso`))
  .catch(error => console.log('Error: ' + error))
  .finally(() => process.exit(0))
