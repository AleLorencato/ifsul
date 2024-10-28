import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import Header from './components/Header/Header'
import Footer from './components/Footer/Footer'
import Cars from './components/Cars/Cars'

function App() {
  const [count, setCount] = useState(0)

  return (
    <>
        <Header></Header>
        <Cars></Cars>
        <Footer></Footer>
    </>
  )
}

export default App
