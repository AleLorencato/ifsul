import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import Task from './components/Task'
import './App.css'

function App() {
  return (
    <>
      <div className="todo-app">
        <h1>Tarefas</h1>
        <Task />
      </div>
    </>
  )
}

export default App
