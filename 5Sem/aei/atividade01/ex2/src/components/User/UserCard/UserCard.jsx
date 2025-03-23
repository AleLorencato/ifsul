import { Link, useParams, useNavigate } from 'react-router-dom'
import { useState, useEffect } from 'react'
import { UserCardContainer, CenteredContainer } from './UserCard.styles'
import { useAuth } from '../../../context/AuthContext'
import { toast } from 'react-toastify'

export default function UserCard() {
  const navigate = useNavigate()
  const { id } = useParams()
  const { user: authUser, removeUser, logout, getUser, updateUser } = useAuth()

  const [buyer, setBuyer] = useState(null)
  const [loading, setLoading] = useState(true)

  const [formData, setFormData] = useState({
    email: '',
    senha: '',
    imagem: null
  })

  useEffect(() => {
    const fetchUser = async () => {
      try {
        const userId = id || authUser?.id
        if (!userId) {
          throw new Error('ID do usuário não disponível.')
        }
        const data = await getUser(userId)
        setBuyer(data)
        setFormData({
          email: data.email || '',
          senha: data.senha || '',
          imagem: null
        })
      } catch (err) {
        console.error(err)
      } finally {
        setLoading(false)
      }
    }

    fetchUser()
  }, [])

  const handleChange = e => {
    const { name, value, files } = e.target
    if (name === 'imagem') {
      setFormData(prev => ({
        ...prev,
        imagem: files[0]
      }))
    } else {
      setFormData(prev => ({
        ...prev,
        [name]: value
      }))
    }
  }

  const handleRemove = async () => {
    try {
      const userId = id || authUser?.id
      if (!userId) {
        throw new Error('ID do usuário não disponível.')
      }
      await removeUser(userId)
      navigate('/')
      toast.success('Conta Excluida com sucesso!')
    } catch (err) {
      console.error(err)
    }
  }

  const handleSubmit = async e => {
    e.preventDefault()

    try {
      const userId = id || authUser?.id
      if (!userId) {
        throw new Error('ID do usuário não disponível.')
      }

      const dataToUpdate = new FormData()
      dataToUpdate.append('_method', 'put')
      dataToUpdate.append('email', formData.email)
      dataToUpdate.append('senha', formData.senha)
      if (formData.imagem) {
        dataToUpdate.append('imagem', formData.imagem)
      }

      const updatedData = await updateUser(userId, dataToUpdate)
      toast.success('Dados atualizados com sucesso!')
      console.log('updatedData', updatedData)
      setBuyer(updatedData)
    } catch (err) {
      console.error(err)
    }
  }

  if (loading) {
    return <p>Carregando...</p>
  }

  return (
    <CenteredContainer>
      <UserCardContainer className="my-8">
        <form onSubmit={handleSubmit} className="w-full">
          <div className="picture">
            {buyer?.imagem ? (
              <img src={buyer.imagem} alt="user" />
            ) : (
              <div className="fallback-image">Imagem não disponível</div>
            )}
          </div>
          <div className="mb-4">
            <label htmlFor="imagem" className="block text-zinc-600">
              Imagem de Perfil
            </label>
            <input
              type="file"
              name="imagem"
              id="imagem"
              accept="image/*"
              onChange={handleChange}
              className="mt-1"
            />
          </div>
          {buyer ? (
            <>
              <div>
                <button
                  onClick={logout}
                  className="button bg-emerald-500 flex justify-center border my-auto mb-3"
                >
                  Sair da Conta
                </button>
                <h1>Dados Pessoais:</h1>
                <h2>Nome: {buyer.name}</h2>
                <label htmlFor="email" className="text-zinc-600 self-start">
                  Email
                </label>
                <input
                  type="text"
                  name="email"
                  id="email"
                  onChange={handleChange}
                  value={formData.email}
                  className="input w-full p-2 border border-gray-300 rounded mt-1 "
                />
                <label htmlFor="senha" className="text-zinc-600 self-start">
                  Senha
                </label>
                <input
                  type="password"
                  name="senha"
                  id="senha"
                  value={formData.senha}
                  onChange={handleChange}
                  className="input w-full p-2 border border-gray-300 rounded mt-1  text-white"
                  required
                />
                <button
                  type="submit"
                  id='submit-btn'
                  className="button flex justify-center border w-full my-auto"
                >
                  Atualizar Dados
                </button>

                <button
                  type="button"
                  onClick={() => {
                    if (window.confirm('Deseja realmente excluir sua conta?')) {
                      handleRemove()
                    }
                  }}
                  className="button flex justify-center border w-full my-auto bg-red-500 hover:bg-red-600"
                >
                  Excluir Conta
                </button>
              </div>
            </>
          ) : (
            <p>Usuário não encontrado.</p>
          )}
        </form>
        <Link to="/dashboard" className="text-blue-500 hover:underline">
          Voltar
        </Link>
      </UserCardContainer>
    </CenteredContainer>
  )
}
