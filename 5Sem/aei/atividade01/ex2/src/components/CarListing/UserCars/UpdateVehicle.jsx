import { useState, useEffect } from 'react'
import { useVehicles } from '../../../context/VehiclesContext'
import { useNavigate, useParams } from 'react-router-dom'
import { toast } from 'react-toastify'

export default function UpdateVehicle() {
  const navigate = useNavigate()
  const { id } = useParams()
  const { updateVehicle, loadVehicle } = useVehicles()

  const user = JSON.parse(localStorage.getItem('@LorencatoMotors-User'))

  const [formData, setFormData] = useState({
    modelo: '',
    marca: '',
    preco: '',
    ano: '',
    cor: '',
    quilometragem: '',
    combustivel: '',
    descricao: '',
    user_id: user.id
  })

  useEffect(() => {
    const fetchVehicle = async () => {
      try {
        const { data } = await loadVehicle(id)
        setFormData({
          titulo: data.titulo,
          modelo: data.carro.modelo,
          marca: data.carro.marca,
          preco: data.preco,
          ano: data.carro.ano,
          cor: data.carro.cor,
          quilometragem: data.carro.quilometragem,
          combustivel: data.carro.combustivel,
          descricao: data.descricao,
          user_id: user.id
        })
      } catch (error) {
        console.error('Error loading vehicle:', error)
      }
    }

    fetchVehicle()
  }, [id])

  const handleChange = e => {
    const { name, value } = e.target
    setFormData(prevState => ({
      ...prevState,
      [name]: value
    }))
  }

  const handleSubmit = async e => {
    e.preventDefault()

    for (const key in formData) {
      if (formData[key] === '') {
        return
      }
    }

    try {
      console.log('formData', formData)
      formData.titulo = `${formData.marca} ${formData.modelo}`
      const response = await updateVehicle(id, formData)
      if (response) {
        setTimeout(() => {
          toast.success('Anúncio atualizado com sucesso!')
          navigate('/meusAnuncios')
        }, 2000)
      }
    } catch (err) {
      console.error('Error updating vehicle:', err)
    }
  }

  return (
    <div className="flex items-center justify-center min-h-screen p-4">
      <form
        onSubmit={handleSubmit}
        className="w-full max-w-lg bg-white p-8 rounded shadow-md"
      >
        <h2 className="text-2xl mb-6 text-center">Atualizar Anúncio</h2>

        <div className="mb-4">
          <label className="block text-gray-700">Marca</label>
          <input
            type="text"
            name="marca"
            value={formData.marca}
            onChange={handleChange}
            className="w-full p-2 border rounded"
            required
          />
        </div>

        <div className="mb-4">
          <label className="block text-gray-700">Modelo</label>
          <input
            type="text"
            name="modelo"
            value={formData.modelo}
            onChange={handleChange}
            className="w-full p-2 border rounded"
            required
          />
        </div>

        <div className="mb-4">
          <label className="block text-gray-700">Preço</label>
          <input
            type="number"
            name="preco"
            value={formData.preco}
            onChange={handleChange}
            className="w-full p-2 border rounded"
            required
          />
        </div>

        <div className="mb-4">
          <label className="block text-gray-700">Ano</label>
          <input
            type="number"
            name="ano"
            value={formData.ano}
            onChange={handleChange}
            className="w-full p-2 border rounded"
            required
          />
        </div>

        <div className="mb-4">
          <label className="block text-gray-700">Cor</label>
          <input
            type="text"
            name="cor"
            value={formData.cor}
            onChange={handleChange}
            className="w-full p-2 border rounded"
            required
          />
        </div>

        <div className="mb-4">
          <label className="block text-gray-700">Quilometragem</label>
          <input
            type="number"
            name="quilometragem"
            value={formData.quilometragem}
            onChange={handleChange}
            className="w-full p-2 border rounded"
            required
          />
        </div>

        <div className="mb-4">
          <label className="block text-gray-700">Combustível</label>
          <select
            name="combustivel"
            value={formData.combustivel}
            onChange={handleChange}
            className="w-full p-2 border rounded"
            required
          >
            <option value="gasolina">Gasolina</option>
            <option value="alcool">Álcool</option>
            <option value="diesel">Diesel</option>
            <option value="flex">Flex</option>
          </select>
        </div>

        <div className="mb-4">
          <label className="block text-gray-700">Descrição</label>
          <textarea
            name="descricao"
            value={formData.descricao}
            onChange={handleChange}
            className="w-full p-2 border rounded"
            rows="4"
            required
          ></textarea>
        </div>

        <button
          type="submit"
          className="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600"
        >
          Atualizar
        </button>
      </form>
    </div>
  )
}
