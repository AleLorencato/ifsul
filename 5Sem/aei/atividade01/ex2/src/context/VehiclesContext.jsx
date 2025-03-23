import { createContext, useState, useContext } from 'react'
import axiosClient from '../services/api/axios-client'
const VehiclesContext = createContext()

export function VehiclesProvider({ children }) {
  const [vehicles, setVehicles] = useState([])

  const loadVehicles = async (filters = {}) => {
    try {
      let url = '/anuncios'
      const params = new URLSearchParams()

      if (filters.precoMin) {
        params.append('preco_min', filters.precoMin)
      }
      if (filters.precoMax) {
        params.append('preco_max', filters.precoMax)
      }
      if (filters.user_id) {
        params.append('user_id', filters.user_id)
      }

      if (params.toString()) {
        url += `?${params.toString()}`
      }

      // Debug log
      console.log('Request URL:', url)
      console.log('Filters:', filters)

      const { data } = await axiosClient.get(url)
      console.log('Response:', data)

      setVehicles(data.data)
    } catch (error) {
      console.error('Error loading vehicles:', error)
      setVehicles([])
    }
  }

  const loadVehicle = async id => {
    try {
      const url = `/anuncios/${id}`
      const { data } = await axiosClient.get(url)
      return data
    } catch (error) {
      console.error(error)
      return null
    }
  }
  const storeVehicle = async vehicle => {
    try {
      const url = '/anuncios'
      const { data } = await axiosClient.post(url, vehicle, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })
      return data
    } catch (error) {
      console.error(error)
      return null
    }
  }
  const updateVehicle = async (id, vehicle) => {
    try {
      const url = `/anuncios/${id}`
      const { data } = await axiosClient.put(url, vehicle)
      return data
    } catch (error) {
      console.error(error)
      return null
    }
  }

  const deleteVehicle = async id => {
    try {
      const url = `/anuncios/${id}`
      await axiosClient.delete(url)
    } catch (error) {
      console.error(error)
      return null
    }
  }

  // useEffect(() => {
  // ;(async () => {
  //   try {
  //     const response = await fetch(`${API_URL}/carros`)
  //     const vehicles = await response.json()
  //     setVehicles(vehicles.data)
  //     console.log(vehicles)
  //     console.log()
  //   } catch (error) {
  //     console.error(error)
  //   }
  // })()
  // }, [])
  return (
    <VehiclesContext.Provider
      value={{
        vehicles,
        loadVehicles,
        loadVehicle,
        storeVehicle,
        updateVehicle,
        deleteVehicle
      }}
    >
      {children}
    </VehiclesContext.Provider>
  )
}

export function useVehicles() {
  return useContext(VehiclesContext)
}
