const tabs = [
  {
    label: 'Comprar Veículo'
  },
  {
    label: 'Vender Veículo'
  },
  {
    label: 'Login',
    isRightAligned: true
  }
]

export default function Header() {
  return (
    <header>
      <nav>
        <ul className="flex items-center justify-center gap-4 bg-zinc-950 p-5">
          {tabs.map(tab => (
            <li
              key={tab.label}
              className={`${
                tab.isRightAligned ? 'ml-auto' : ''
              } flex justify-center p-2 border border-zinc-300 hover:bg-zinc-600 rounded-full`}
            >
              {tab.label}
            </li>
          ))}
        </ul>
      </nav>
    </header>
  )
}
