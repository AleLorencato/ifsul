import { createRoot } from 'react-dom/client'
import { BrowserRouter } from 'react-router-dom'
import './index.css'
import { VehiclesProvider } from './context/VehiclesContext'
import { UserProvider } from './context/UserContext.jsx'
import { AuthProvider } from './context/AuthContext'
import { Router } from './routes'
import { ToastContainer } from 'react-toastify'
import 'flowbite'
createRoot(document.getElementById('root')).render(
  <AuthProvider>
    <VehiclesProvider>
      <UserProvider>
        <BrowserRouter>
          <Router />
          <ToastContainer />
        </BrowserRouter>
      </UserProvider>
    </VehiclesProvider>
  </AuthProvider>
)
