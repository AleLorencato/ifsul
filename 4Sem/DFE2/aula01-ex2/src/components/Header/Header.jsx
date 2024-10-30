const tabs = [
  {
    label: 'Comprar Veículo'
  },
  {
    label: 'Vender Veículo'
  },
  {
    label: 'Login'
  }
]

export default function Header() {
  return (
    <header>
      <nav>
        <ul className="flex items-center justify-center gap-4">
          {tabs.map(tab => (
            <li key={tab.label} className="flex justify-center">
              {tab.label}
            </li>
          ))}
        </ul>
      </nav>
    </header>
  )
}
