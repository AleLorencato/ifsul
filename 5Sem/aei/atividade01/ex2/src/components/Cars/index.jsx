import { Link } from 'react-router-dom'
import { useVehicles } from '../../context/VehiclesContext'
import { useEffect } from 'react'
import Card from './Card'

import './style.css'

export default function Cars() {
  const { vehicles, loadVehicles } = useVehicles()
  useEffect(() => {
    loadVehicles()
  }, [])
  return (
    <div className="flex flex-col items-center justify-center min-h-screen ">
      <section className="flex gap-4 justify-center flex-wrap items-stretch">
        {vehicles.map(car => (
          <Link to={`/veiculo/${car.id}`} key={car.id} className="no-underline">
            <Card car={car} />
          </Link>
        ))}
      </section>
    </div>
  )
}
