import { Link, useNavigate } from 'react-router-dom'
import { useState } from 'react'
import { useAuth } from '../../../context/AuthContext'
import { toast } from 'react-toastify'

export default function Signup() {
  const navigate = useNavigate()
  const { storeUser } = useAuth()

  const [nome, setNome] = useState('')
  const [email, setEmail] = useState('')
  const [cpf, setCpf] = useState('')
  const [senha, setSenha] = useState('')
  const [confirmaSenha, setConfirmaSenha] = useState('')

  const handleSubmit = async event => {
    event.preventDefault()
    const payload = {
      name: nome,
      email,
      cpf,
      password: senha,
      confirmaSenha
    }
    if (senha !== confirmaSenha) {
      toast.error('As senhas não conferem')
      return false
    }
    storeUser(payload)
      .then(response => {
        if (response) {
          console.log('Usuário cadastrado com sucesso')
          navigate('/login')
        }
      })
      .catch(error => {
        console.error(error)
      })
  }
  return (
    <div className="login-wrapper bg-white p-8 rounded-2xl shadow-md w-[540px] max-w-full">
      <form onSubmit={handleSubmit} id="form">
        <div className="mb-4">
          <label htmlFor="nome" className="block text-gray-700">
            Nome
          </label>
          <input
            type="text"
            name="nome"
            id="nome"
            placeholder="Digite seu Nome"
            className="input w-full p-2 border border-gray-300 rounded mt-1  "
            value={nome}
            onChange={e => setNome(e.target.value)}
          />
        </div>
        <div className="mb-4">
          <label htmlFor="email" className="block text-gray-700">
            E-mail
          </label>
          <input
            type="email"
            id="email"
            name="email"
            placeholder="Digite seu e-mail"
            className="input w-full p-2 border border-gray-300 rounded mt-1 "
            value={email}
            onChange={e => setEmail(e.target.value)}
          />
        </div>
        <div className="mb-4">
          <label htmlFor="cpf" className="block text-gray-700">
            CPF
          </label>
          <input
            type="text"
            name="cpf"
            id="cpf"
            placeholder="Digite seu CPF"
            className="input w-full p-2 border border-gray-300 rounded mt-1 "
            value={cpf}
            onChange={e => setCpf(e.target.value)}
          />
        </div>
        <div className="mb-4">
          <label htmlFor="senha" className="block text-gray-700">
            Senha
          </label>
          <input
            type="password"
            name="senha"
            id="senha"
            placeholder="Digite sua senha"
            className="input w-full p-2 border border-gray-300 rounded mt-1 "
            value={senha}
            onChange={e => setSenha(e.target.value)}
          />
        </div>
        <div className="mb-4">
          <label htmlFor="sh2" className="block text-gray-700">
            Confirme sua senha
          </label>
          <input
            type="password"
            name="confirmação senha"
            id="sh2"
            placeholder="Confirme sua senha"
            className="input w-full p-2 border border-gray-300 rounded mt-1 "
            value={confirmaSenha}
            onChange={e => setConfirmaSenha(e.target.value)}
          />
        </div>
        <div className="mb-4">
          <button
            type="submit"
            id="cadastrar"
            name="cadastrar"
            value="Cadastrar"
            className="btn-primary w-full p-2 bg-blue-700 text-white rounded"
          >
            Cadastrar
          </button>
        </div>
      </form>
      <h2 className="text-center text-gray-700">Já tem uma conta?</h2>
      <p className="text-center text-gray-600">
        Faça login para acessar sua conta.
      </p>
      <div className="text-center mt-4">
        <Link to={'/login'}>
          <button
            id="login"
            name="login"
            className="btn-secondary w-full p-2 bg-zinc-500 text-white rounded mt-2"
          >
            Fazer Login
          </button>
        </Link>
      </div>
    </div>
  )
}
