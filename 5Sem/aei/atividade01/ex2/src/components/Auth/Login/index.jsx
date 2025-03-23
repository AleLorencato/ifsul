import { Link, useNavigate } from 'react-router-dom'
import { useState } from 'react'
import { useAuth } from '../../../context/AuthContext'

export default function Login() {
  const navigate = useNavigate()
  const { login } = useAuth()
  const [email, setEmail] = useState('')
  const [password, setPassword] = useState('')
  const onSubmit = event => {
    event.preventDefault()
    login({ email, password })
      .then(token => {
        if (token) {
          console.log('navegando para dashboard com token:', token)
          navigate('/dashboard')
        }
      })
      .catch(error => {
        console.error(error)
      })
  }

  return (
    <div className="login-wrapper bg-white p-8 rounded-2xl shadow-md w-[540px] max-w-full">
      <form onSubmit={onSubmit} id="form">
        <div className="mb-4">
          <label htmlFor="email" className="block text-gray-700">
            E-mail
          </label>
          <input
            type="email"
            name="email"
            id="email"
            onChange={e => setEmail(e.target.value)}
            value={email}
            placeholder="E-mail"
            className="input w-full p-2 border border-gray-300 rounded mt-1"
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
            onChange={e => setPassword(e.target.value)}
            value={password}
            placeholder="Senha"
            className="input w-full p-2 border border-gray-300 rounded mt-1"
          />
        </div>
        <div className="mb-4">
          <button
            type="submit"
            id="entrar"
            name="entrar"
            value="Entrar"
            className="btn-primary w-full p-2 bg-blue-700 text-white rounded"
          >
            Entrar
          </button>
        </div>
      </form>
      <h2 className="text-center text-gray-700">
        Esta é a sua primeira vez aqui?
      </h2>
      <p className="text-center text-gray-600">
        Para ter acesso completo a este site, você primeiro precisa criar uma
        conta.
      </p>
      <div className="text-center mt-4">
        <Link to={'/cadastro'}>
          <button
            id="cad"
            name="cad"
            className="btn-secondary w-full p-2 bg-zinc-500 text-white rounded mt-2"
          >
            Criar Conta
          </button>
        </Link>
      </div>
      <h2 className="text-center text-gray-700 mt-4">Página do Vendedor</h2>
      <div className="text-center mt-4">
        <a href="">
          <button
            id="cad"
            name="cad"
            className="btn-secondary w-full p-2 bg-zinc-500 text-white rounded mt-2"
          >
            Acessar como Vendedor
          </button>
        </a>
      </div>
    </div>
  )
}
