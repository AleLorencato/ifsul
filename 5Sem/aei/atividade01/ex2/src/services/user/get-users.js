import axiosClient from '../api/axios-client'

export async function getUsers() {
  const url = `/users`
  try {
    const response = await axiosClient.get(url)
    return response.data
  } catch (error) {
    console.error('Erro ao buscar usuário:', error)
    throw error
  }
}
