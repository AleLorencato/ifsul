import { useEffect, useState } from 'react'
import { useVehicles } from '../../../context/VehiclesContext'
import { useAuth } from '../../../context/AuthContext'
import Card from '../../Cars/Card'
import Header from '../../Header'

export default function UserCarListing() {
  const { vehicles, loadVehicles } = useVehicles()
  const { user } = useAuth()
  const [openDropdownId, setOpenDropdownId] = useState(null)

  useEffect(() => {
    if (user?.id) {
      loadVehicles({
        user_id: user.id
      })
    }
  }, [])

  const toggleDropdown = id => {
    setOpenDropdownId(openDropdownId === id ? null : id)
  }

  return (
    <div className="flex flex-col">
      <Header />
      <main className="flex-1 pt-20 p-4">
        <section className="flex gap-4 justify-center flex-wrap items-stretch">
          {vehicles.map(car => (
            <div key={car.id} className="relative group">
              <Card
                car={car}
                onToggleDropdown={toggleDropdown}
                isDropdownOpen={openDropdownId === car.id}
                showDropdown
              />
            </div>
          ))}
        </section>
      </main>
    </div>
  )
}
