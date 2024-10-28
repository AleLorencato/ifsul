import './cars.css'
export default function Cars() {
  return (
    <div className="container">
      <h1>Carros</h1>
      <section className="car-list">
        <div className="car-card">
          <h2 className="car-title">Carro 1</h2>
          <p className="car-details">Marca: Marca 1</p>
          <p className="car-details">Modelo: Modelo 1</p>
          <p className="car-price">R$ 50.000</p>
        </div>
        <div className="car-card">
          <h2 className="car-title">Carro 2</h2>
          <p className="car-details">Marca: Marca 2</p>
          <p className="car-details">Modelo: Modelo 2</p>
          <p className="car-price">R$ 60.000</p>
        </div>
        <div className="car-card">
          <h2 className="car-title">Carro 3</h2>
          <p className="car-details">Marca: Marca 3</p>
          <p className="car-details">Modelo: Modelo 3</p>
          <p className="car-price">R$ 70.000</p>
        </div>
      </section>
    </div>
  )
}
