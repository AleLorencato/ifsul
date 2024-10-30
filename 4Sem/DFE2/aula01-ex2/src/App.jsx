import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import Header from './components/Header/Header'
import Footer from './components/Footer/Footer'
import Cars from './components/Cars/Cars'

function App() {
  return (
    <div className="h-screen w-full flex flex-col bg-zinc-900">
      <Header></Header>
      <Cars></Cars>
      <Footer></Footer>
    </div>
  )
}

export default App
