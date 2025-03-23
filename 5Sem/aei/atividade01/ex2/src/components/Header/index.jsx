import { useAuth } from '../../context/AuthContext'
import { NavLink } from './Header.styles'
import AccountCircleIcon from '@mui/icons-material/AccountCircle'
import { Link } from 'react-router-dom'
import CustomSvg from '../ui/'
export default function Header() {
  const { user } = useAuth()

  const id = user?.id

  const tabs = [
    {
      label: 'Comprar Veículo',
      link: '/dashboard',
      id: 'dashboard'
    },
    {
      label: 'Vender Veículo',
      link: '/anunciar',
      id: 'anunciar'
    },
    {
      label: 'Meus Anúncios',
      link: '/meusanuncios',
      id: 'meusanuncios'
    }
  ]

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
  }

  return (
    <header className="bg-zinc-600 fixed top-0 w-full z-50 h-20">
      <nav>
        <ul className="flex items-center justify-between gap-4 p-1">
          <Link to={'/'}>
            <CustomSvg />
          </Link>
          <p className="font-semibold font-">Lorencato Motors</p>
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
      </nav>
    </header>
  )
}
