import { initializeApp } from 'firebase/app'
import { firebaseConfig } from './firebaseConfig.js'
import { child, getDatabase, push, ref, set } from 'firebase/database'

const app = initializeApp(firebaseConfig)
const db = getDatabase()

const clientes = [
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
]

async function criaCliente(cliente, i) {
  let refNode = ref(db, `clientes/${i}`)
  await set(refNode, cliente)
    .then(() => console.log(`Cliente ${i} criado com sucesso!`))
    .catch(error => console.log('Erro ao criar cliente: ' + error))
}

;(async () => {
  for (let i = 0; i < clientes.length; i++) {
    await criaCliente(clientes[i], i)
  }
  process.exit(0)
})()
