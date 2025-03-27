// Import the functions you need from the SDKs you need
import { initializeApp } from 'firebase/app'
import { getAnalytics } from 'firebase/analytics'
import { getDatabase, set, ref, push, child } from 'firebase/database'
import { firebaseConfig } from './firebase-config.js'

// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional

// Initialize Firebase
const app = initializeApp(firebaseConfig)

const db = getDatabase()
// const analytics = getAnalytics(app);

// let newUserID = 1
// let refNode = ref(db, `users/${newUserID}`)
// let newUserData = { email: 'fulano@ifsul.edu.br', username: 'fulano' }
// set(refNode, newUserData)

// const newUser = {
//   email: 'beltrano@ifsul.edu.br',
//   username: 'beltrano'
// }

// push(ref(db, 'users/'), newUser)

// set(ref(db, 'users/' + 3), {
//   email: 'homer@simpsons.com',
//   username: 'homer'
// })
//   .then(() => {
//     console.log('Registro Alterado!!!.')
//     process.exit(0)
//   })
//   .catch(error => {
//     console.error('Erro ao alterar registro: ', error)
//     process.exit(1)
//   })

const refNode = ref(db, 'users/3')

const refAttr = child(refNode, 'username')

set(refAttr, 'homeroo')
  .then(() => {
    console.log('Registro Alterado!!!.')
    process.exit(0)
  })
  .catch(error => {
    console.error('Erro ao alterar registro: ', error)
    process.exit(1)
  })
