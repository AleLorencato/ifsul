const cars = [
  {
    title: 'Carro 1',
    marca: 'Marca 1',
    modelo: 'Modelo 1',
    price: 'R$ 50.000'
  },
  {
    title: 'Carro 2',
    marca: 'Marca 2',
    modelo: 'Modelo 2',
    price: 'R$ 60.000'
  },
  {
    title: 'Carro 3',
    marca: 'Marca 3',
    modelo: 'Modelo 3',
    price: 'R$ 70.000'
  }
]
export default function Cars() {
  return (
    <div className="flex flex-col items-center justify-center min-h-screen">
      <h1 className="text-xl font-bold">Carros</h1>
      <section className="flex gap-4 justify-center">
        {cars.map(car => (
          <div
            key={car.title}
            className="p-5 m-2 w-64 border border-gray-300 rounded-lg shadow-md transition-transform duration-300 hover:transform hover:-translate-y-1 hover:shadow-lg"
          >
            <h2 className="text-lg font-bold">{car.title}</h2>
            <p className="text-base">{car.marca}</p>
            <p className="text-sm">{car.modelo}</p>
            <p className="text-base font-bold text-green-600">{car.price}</p>
          </div>
        ))}
      </section>
    </div>
  )
}
