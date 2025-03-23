import { useState } from 'react'
import { useVehicles } from '../../../context/VehiclesContext'
import { useNavigate } from 'react-router-dom'
import { toast } from 'react-toastify'

export default function AddVehicle() {
  const navigate = useNavigate()
  const { storeVehicle } = useVehicles()

  const MAX_FILE_SIZE = 5 * 1024 * 1024
  const ALLOWED_TYPES = ['image/jpeg', 'image/png', 'image/webp']
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
    titulo: '',
    imagens: [],
    user_id: user.id
  })

  const handleChange = e => {
    const { name, value } = e.target
    setFormData(prevState => ({
      ...prevState,
      [name]: value
    }))
  }

  const handleImageUpload = e => {
    const files = Array.from(e.target.files)

    const validFiles = files.filter(file => {
      if (!ALLOWED_TYPES.includes(file.type)) {
        toast.error(`${file.name} - Formato não suportado`)
        return false
      }
      if (file.size > MAX_FILE_SIZE) {
        toast.error(`${file.name} - Arquivo muito grande (max 5MB)`)
        return false
      }
      return true
    })

    setFormData(prevState => ({
      ...prevState,
      imagens: [...prevState.imagens, ...validFiles]
    }))
  }

  const handleSubmit = async e => {
    e.preventDefault()

    formData.titulo = `${formData.marca} ${formData.modelo}`
    const formDataToSend = new FormData()
    for (const key in formData) {
      if (key === 'imagens') {
        formData[key].forEach(file => {
          formDataToSend.append('imagens[]', file)
        })
      } else {
        formDataToSend.append(key, formData[key])
      }
    }

    const response = await storeVehicle(formDataToSend)
    if (response) {
      setTimeout(() => {
        toast.success('Anúncio cadastrado com sucesso!')
        navigate('/dashboard')
      }, 1500)
    } else {
      toast.error('Falha ao cadastrar o veículo.')
    }
  }

  return (
    <div className="flex items-center justify-center min-h-screen p-4">
      <form
        onSubmit={handleSubmit}
        className="w-full max-w-lg bg-white p-8 rounded shadow-md"
      >
        <h2 className="text-2xl mb-6 text-center">Anunciar Veículo</h2>

        <div className="flex flex-wrap gap-4">
          {formData.imagens.map((file, index) => (
            <div
              key={index}
              className="relative w-32 h-32 bg-gray-200 border border-dashed flex items-center justify-center rounded"
            >
              <img
                src={URL.createObjectURL(file)}
                alt={`imagem-${index}`}
                className="w-full h-full object-cover rounded"
              />
            </div>
          ))}
          <label className="w-32 h-32 flex items-center justify-center bg-gray-200 border border-dashed rounded cursor-pointer">
            <input
              type="file"
              multiple
              accept="image/*"
              onChange={handleImageUpload}
              className="hidden"
            />
            <span className="text-2xl text-gray-500">+</span>
          </label>
        </div>
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
          Anunciar
        </button>
      </form>
    </div>
  )
}
