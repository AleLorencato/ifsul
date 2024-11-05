import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import TodoList from './components/TodoList'
import './App.css'

function App() {
  return (
    <>
      <div className="todo-app">
        <h1>Todo List</h1>
        <TodoList />
      </div>
    </>
  )
}

export default App
