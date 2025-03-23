import { useParams } from 'react-router-dom'
import { useEffect, useState } from 'react'
import { useVehicles } from '../../context/VehiclesContext'
import { toast } from 'react-toastify'
import Header from '../../components/Header'

export default function CarDetail() {
  const { id } = useParams()
  const { loadVehicle } = useVehicles()
  const [car, setCar] = useState()
  const [anuncio, setAnuncio] = useState()
  const [fotos, setFotos] = useState([])

  const [loading, setLoading] = useState(true)

  const [currentIndex, setCurrentIndex] = useState(0)

  const nextSlide = () => {
    setCurrentIndex(prevIndex =>
      prevIndex === fotos.length - 1 ? 0 : prevIndex + 1
    )
  }

  const prevSlide = () => {
    setCurrentIndex(prevIndex =>
      prevIndex === 0 ? fotos.length - 1 : prevIndex - 1
    )
  }

  useEffect(() => {
    const fetchVehicle = async () => {
      try {
        const response = await loadVehicle(id)
        if (response) {
          setCar(response.data.carro)

          setAnuncio(response.data)

          const imagensComURL = response.data.imagens.map(img => ({
            ...img,
            url: `${img.imagem}`
          }))

          setFotos(imagensComURL)
          console.log(fotos)
          console.log(response.data)
        } else {
          toast.error('Falha ao carregar o veículo.')
        }
      } catch (err) {
        toast.error('Falha ao carregar o veículo: ' + err.message)
      } finally {
        setLoading(false)
      }
    }

    if (id) {
      fetchVehicle()
    } else {
      toast.error('ID do veículo não fornecido.')
      setLoading(false)
    }
  }, [id, loadVehicle])

  if (loading) {
    return <p>Carregando...</p>
  }

  if (!car) {
    return <p>Veículo não encontrado.</p>
  }

  return (
    <div className="min-h-screen bg-zinc-800">
      <Header />
      <main className="pt-20">
        <div className="w-full h-[calc(100vh-5rem)]">
          <div className="bg-zinc-600 h-full">
            {/* Seção do Carrossel */}
            <div className="relative w-full h-[60vh]">
              <div className="relative h-full overflow-hidden">
                {fotos.length > 0 ? (
                  fotos.map((foto, index) => (
                    <div
                      key={foto.id}
                      className={`absolute w-full h-full transition-opacity duration-700 ease-in-out
                      ${index === currentIndex ? 'opacity-100' : 'opacity-0'}`}
                    >
                      <img
                        src={foto.url}
                        className="absolute block w-full h-full object-cover"
                        alt={`Foto ${index + 1} do ${car.marca} ${car.modelo}`}
                      />
                    </div>
                  ))
                ) : (
                  <div className="flex items-center justify-center h-full bg-gray-700">
                    <p className="text-gray-400">Sem imagens disponíveis</p>
                  </div>
                )}
              </div>

              {/* Botões do Carrossel */}
              {fotos.length > 1 && (
                <>
                  <button
                    onClick={prevSlide}
                    className="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                  >
                    <span className="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
                      <svg
                        className="w-4 h-4 text-white rtl:rotate-180"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 6 10"
                      >
                        <path
                          stroke="currentColor"
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          strokeWidth="2"
                          d="M5 1 1 5l4 4"
                        />
                      </svg>
                    </span>
                  </button>
                  <button
                    onClick={nextSlide}
                    className="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                  >
                    <span className="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
                      <svg
                        className="w-4 h-4 text-white rtl:rotate-180"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 6 10"
                      >
                        <path
                          stroke="currentColor"
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          strokeWidth="2"
                          d="m1 9 4-4-4-4"
                        />
                      </svg>
                    </span>
                  </button>
                </>
              )}
            </div>

            <div className="px-4 py-6 lg:px-8">
              <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                {/* Coluna da Esquerda (Preco,ano,quilometragem....) */}
                <div className="space-y-4">
                  <h1 className="text-2xl font-bold text-white">
                    {car.marca} {car.modelo}
                  </h1>
                  <p className="text-xl text-white">R$ {anuncio.preco}</p>
                  <div className="space-y-2 text-gray-300">
                    <p>Ano: {car.ano}</p>
                    <p>Quilometragem: {car.quilometragem} km</p>
                    <p>Combustível: {car.combustivel}</p>
                    <p>Cor: {car.cor}</p>
                  </div>
                </div>

                {/* Coluna da Direita (descricao e vendedor) */}
                <div className="space-y-4">
                  <h2 className="text-xl font-bold text-white">Descrição</h2>
                  <p className="text-gray-300">{anuncio.descricao}</p>
                  <div className="space-y-2">
                    <h3 className="text-lg font-bold text-white">Vendedor</h3>
                    <p className="text-gray-300">{anuncio.user.name}</p>
                    <p className="text-gray-300">{anuncio.user.email}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  )
}
