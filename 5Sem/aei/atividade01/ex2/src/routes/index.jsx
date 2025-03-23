import { Routes, Route } from 'react-router-dom'
import ProtectedRoute from '../components/ProtectedRoute'

import { HomePage } from '../pages/Home'
import AuthContainer from '../components/Auth/AuthContainer'
import Login from '../components/Auth/Login'
import Signup from '../components/Auth/Signup'
import { DashboardPage } from '../pages/Dashboard'
import UserCard from '../components/User/UserCard/UserCard'
import CarDetail from '../pages/CarDetail'
import AddVehicle from '../components/CarListing/AddVehicle'
import UserCarListing from '../components/CarListing/UserCars'
import UpdateVehicle from '../components/CarListing/UserCars/UpdateVehicle'

export const Router = () => {
  return (
    <Routes>
      <Route path="/" element={<HomePage />} />

      <Route element={<AuthContainer />}>
        <Route path="/login" element={<Login />} />
        <Route path="/cadastro" element={<Signup />} />
      </Route>

      <Route path="/dashboard" element={<DashboardPage />} />
      <Route
        path="/user/:id"
        element={
          <ProtectedRoute>
            <UserCard />
          </ProtectedRoute>
        }
      />
      <Route path="/veiculo/:id" element={<CarDetail />} />
      <Route
        path="/anunciar"
        element={
          <ProtectedRoute>
            <AddVehicle />
          </ProtectedRoute>
        }
      />
      <Route
        path="/meusanuncios"
        element={
          <ProtectedRoute>
            <UserCarListing />
          </ProtectedRoute>
        }
      />
      <Route
        path="/meusanuncios/editar/:id"
        element={
          <ProtectedRoute>
            <UpdateVehicle />
          </ProtectedRoute>
        }
      />
    </Routes>
  )
}
