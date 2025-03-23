import axiosClient from '../api/axios-client'

export async function createUser(payload) {
  try {
    console.log('aaaa')

    const response = await axiosClient.post('/users', payload)
    return response.data
  } catch (error) {
    console.error('Erro ao criar usuário:', error)
    throw error
  }
}
