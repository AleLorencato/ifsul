import { Link } from 'react-router-dom'
import logo from './logo.png'
import { useAuth } from '../../context/AuthContext.jsx'
import AccountCircleIcon from '@mui/icons-material/AccountCircle'
import { NavLink } from './Header.styles'
export function HomePage() {
  const { user } = useAuth()
  const id = user?.id
  const tabs = []

  if (user) {
    tabs.push({
      label: user.name,
      link: `/user/${id}`,
      isRightAligned: true,
      icon: <AccountCircleIcon />,
      id: 'perfil'
    })
  } else {
    tabs.push({
      label: 'Login',
      link: '/login',
      isRightAligned: true,
      id: 'login'
    })
    tabs.push({
      label: 'Fazer Cadastro',
      link: '/signup',
      isRightAligned: true
    })
  }
  return (
    <div className="flex flex-col h-screen">
      <header className="flex items-center justify-between p-4 bg-zinc-600 h-20">
        <img src={logo} alt="Lorençato Motors" />
        <div className="">
          <ul className="flex items-center justify-between gap-4 p-1">
            {tabs.map(tab => (
              <li
                key={tab.label}
                className={`${
                  tab.isRightAligned ? 'ml-auto' : ''
                } flex justify-center p-2 `}
                id={tab.id}
              >
                <NavLink to={tab.link}>
                  {tab.icon}
                  <span className="ml-2 text-white">{tab.label}</span>
                </NavLink>
              </li>
            ))}
          </ul>
        </div>
      </header>
      <main className="flex flex-col flex-1 py-20 p-4 overflow-y-auto items-center justify-self-stretch justify-center">
        <h1 className="text-5xl font-semibold tracking-wider mb-8 align-center text-center">
          Lorençato Motors
        </h1>
        <div className="grid grid-cols-2 w-96 gap-2 ">
          <Link to={'/dashboard'} className="button m-2">
            Comprar Carro
          </Link>
          <Link to={'/anunciar'} className="button m-2">
            Vender Carro
          </Link>
        </div>
      </main>
    </div>
  )
}
