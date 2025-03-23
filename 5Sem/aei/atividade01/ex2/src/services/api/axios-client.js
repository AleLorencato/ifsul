import axios from 'axios'
import { toast } from 'react-toastify'

const axiosClient = axios.create({
  baseURL: 'http://127.0.0.1:8000/api',
  headers: {
    Accept: 'application/json'
  }
})

axiosClient.interceptors.request.use(config => {
  const token = localStorage.getItem('@LorencatoMotors-Token')
  if (token) {
    config.headers.Authorization = `Bearer ${token}`
  }
  return config
})

axiosClient.interceptors.response.use(
  response => response,
  error => {
    if (error.response.status === 401) {
      localStorage.removeItem('@LorencatoMotors-Token')
      localStorage.removeItem('@LorencatoMotors-User')
      window.location.href = '/login'
    }
    console.log(error)
    console.error(error)
    toast.error(`Erro no servidor: ${error?.response?.data?.message}`)
    return Promise.reject(error)
  }
)

export default axiosClient
