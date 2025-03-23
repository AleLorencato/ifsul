import axiosClient from '../api/axios-client'

export async function updateUser(id, data) {
  try {
    const response = await axiosClient.post(`/users/${id}`, data, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    })

    return response.data
  } catch (error) {
    console.error('Erro ao atualizar usuário:', error)
    throw error
  }
}
