import axiosClient from '../api/axios-client'

export async function deleteUser(id) {
  try {
    const response = await axiosClient.delete(`/users/${id}`)
    return response.data
  } catch (error) {
    console.error('Erro ao deletar usuário:', error)
    throw error
  }
}
