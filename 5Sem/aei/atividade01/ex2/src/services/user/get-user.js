import axiosClient from '../api/axios-client'

export async function getUser(id) {
  const url = id ? `/users/${id}` : '/'
  try {
    const response = await axiosClient.get(url)
    return response.data
  } catch (error) {
    console.error('Erro ao buscar usuário:', error)
    throw error
  }
}
