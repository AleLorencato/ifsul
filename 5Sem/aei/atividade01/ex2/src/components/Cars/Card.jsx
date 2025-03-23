import { Link } from 'react-router-dom'
import { useVehicles } from '../../context/VehiclesContext'
import { toast } from 'react-toastify'

export default function Card({
  car,
  onToggleDropdown,
  isDropdownOpen,
  showDropdown
}) {
  const { deleteVehicle } = useVehicles()

  const onDelete = async () => {
    try {
      await deleteVehicle(car.id)
      setTimeout(() => {
        window.location.reload()
      }, 2000)
      toast.success('Veículo excluído com sucesso!')
    } catch (error) {
      console.error(error)
    }
  }
  return (
    <div className="p-5 m-2 w-64 h-80 bg-white rounded-lg shadow-md transition-transform duration-300 hover:transform hover:-translate-y-1 hover:shadow-lg">
      <div className="car-picture">
        {car.imagens.length > 0 ? (
          <img
            src={car.imagens[0].imagem}
            alt=""
            className="object-cover h-full w-full"
          />
        ) : (
          <h2 className="text-lg font-bold text-white">
            Imagem não disponível
          </h2>
        )}
      </div>
      <div className="car-desc">
        <p className="text-base font-bold text-gray-800">
          {car.carro.marca + ' ' + car.carro.modelo}
        </p>
        <p className="text-lg text-gray-800 font-semibold">R$ {car.preco}</p>
        {showDropdown && (
          <div className="relative left-44">
            <button
              onClick={() => onToggleDropdown(car.id)}
              className="text-white bg-emerald-500 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-normal rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center"
              type="button"
            >
              <svg
                className="w-2.5 h-2.5"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 10 6"
              >
                <path
                  stroke="currentColor"
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth="2"
                  d="m1 1 4 4 4-4"
                />
              </svg>
            </button>
            {isDropdownOpen && (
              <div className="right-0 top-full mt-2 z-50 bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                <ul className="py-2 text-sm text-gray-700">
                  <li>
                    <Link
                      to={`/meusAnuncios/editar/${car.id}`}
                      className="block w-full text-left px-4 py-2 hover:bg-gray-100"
                    >
                      Editar
                    </Link>
                  </li>
                  <li>
                    <button
                      className="block w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600"
                      onClick={() => {
                        if (
                          window.confirm(
                            'Deseja realmente excluir este veículo?'
                          )
                        ) {
                          onDelete()
                        }
                      }}
                    >
                      Excluir
                    </button>
                  </li>
                </ul>
              </div>
            )}
          </div>
        )}
      </div>
    </div>
  )
}
