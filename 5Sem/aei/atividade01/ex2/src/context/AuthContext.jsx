import { createContext, useState, useContext } from 'react'
import { getUser as gu } from '../services/user/get-user'
import { updateUser as up } from '../services/user/update-user'
import { deleteUser } from '../services/user/delete-user'
import { createUser } from '../services/user/create-user'
import { getUsers } from '../services/user/get-users'

import axiosClient from '../services/api/axios-client'

const AuthContext = createContext()

export function AuthProvider({ children }) {
  const [isAuthenticated, setIsAuthenticated] = useState(
    !!localStorage.getItem('@LorencatoMotors-Token')
  )
  const [user, setUser] = useState(
    JSON.parse(localStorage.getItem('@LorencatoMotors-User'))
  )

  const loadUsers = async () => {
    try {
      const { data } = await getUsers()
      return data
    } catch (error) {
      console.error(error)
    }
  }

  const getUser = async id => {
    try {
      const { data } = await gu(id)
      console.log('Entrei no getUser no Context')
      setUser(data)
      return data
    } catch (error) {
      console.error(error)
    }
  }

  const storeUser = async payload => {
    try {
      const data = await createUser(payload)
      setUser(data)
      return data
    } catch (error) {
      console.error(error)
      throw error
    }
  }

  const updateUser = async (id, user) => {
    try {
      const {data} = await up(id, user)
      setUser(data)
      return data
    } catch (error) {
      console.error(error)
      throw error
    }
  }

  const removeUser = async id => {
    try {
      const data = await deleteUser(id)
      setUser(null)
      setIsAuthenticated(false)
      return data
    } catch (error) {
      console.error(error)
      throw error
    }
  }

  const login = async payload => {
    try {
      const response = await axiosClient.post('/login', payload)
      console.log(response)
      console.log(response.data)
      const { data } = response
      localStorage.setItem('@LorencatoMotors-Token', data.token)
      localStorage.setItem('@LorencatoMotors-User', JSON.stringify(data.user))
      console.log(data.token)
      setUser(data.user)
      setIsAuthenticated(true)
      return data.token
    } catch (error) {
      console.error(error)
    }
  }

  const logout = () => {
    localStorage.removeItem('@LorencatoMotors-Token')
    localStorage.removeItem('@LorencatoMotors-User')
    setIsAuthenticated(false)
    setUser(null)
  }

  return (
    <AuthContext.Provider
      value={{
        isAuthenticated,
        login,
        logout,
        user,
        storeUser,
        updateUser,
        removeUser,
        getUser,
        loadUsers
      }}
    >
      {children}
    </AuthContext.Provider>
  )
}

export function useAuth() {
  return useContext(AuthContext)
}
