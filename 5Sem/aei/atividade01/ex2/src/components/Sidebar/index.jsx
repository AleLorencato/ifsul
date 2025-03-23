import { useState } from 'react'
import { useVehicles } from '../../context/VehiclesContext'
import Input from '../Input'
import Button from '../Button'
export default function Sidebar() {
  const { loadVehicles } = useVehicles()
  const [precoMin, setPrecoMin] = useState('')
  const [precoMax, setPrecoMax] = useState('')

  const handleFilter = e => {
    e.preventDefault()
    loadVehicles({
      precoMin: precoMin !== '' ? precoMin : undefined,
      precoMax: precoMax !== '' ? precoMax : undefined
    })
  }

  return (
    <aside
      id="logo-sidebar"
      className="fixed top-20 left-0 z-40 w-64 h-full bg-white border-y-2 border-y-gray-500 "
      aria-label="Sidebar"
    >
      <div className="h-full px-3 py-4 overflow-y-auto bg-zinc-600">
        <form onSubmit={handleFilter}>
          <ul className="space-y-2 font-medium">
            <li className="mb-4">
              <Input
                type="number"
                name="preco-min"
                id="preco-min"
                value={precoMin}
                placeholder="Insira o Preço Mínimo"
                onChange={e => setPrecoMin(e.target.value)}
                label="Preço Mínimo:"
              />
              <Input
                type="number"
                name="preco-max"
                id="preco-max"
                value={precoMax}
                placeholder="Insira o Preço Máximo"
                onChange={e => setPrecoMax(e.target.value)}
                label="Preço Máximo:"
              />

              <Button
                text="Buscar"
                width="w-32"
                type="submit"
              />
            </li>
          </ul>
        </form>
      </div>
    </aside>
  )
}
