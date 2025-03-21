import { signInWithEmailAndPassword } from 'firebase/auth'
import { createContext, useContext } from 'react'
import { auth } from '../firebase/firebaseInit'

const AuthContext = createContext({})
export const AuthProvider = ({ children }) => {
  async function login() {
    signInWithEmailAndPassword(auth, 'legal@gmail.com', 'teste120')
      .then(userCredential => {
        const user = userCredential.user
        console.log('Autenticou com sucesso', user)
      })
      .catch(error => {
        const errorCode = error.code
        const errorMessage = error.message
        console.error(errorCode, errorMessage)
      })
  }

  return (
    <AuthContext.Provider value={{ login }}>{children}</AuthContext.Provider>
  )
}

export default useAuth = () => {
  return useContext(AuthContext)
}
