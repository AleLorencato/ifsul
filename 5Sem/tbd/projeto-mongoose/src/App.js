import { useState, useEffect } from 'react'
import './App.css'
import { Button, FormControl, Input, InputLabel } from '@mui/material'
import Todo from './components/Todo.js'
import axios from 'axios'

function App() {
  const [todos, setTodos] = useState([])
  const [input, setInput] = useState('')
  useEffect(() => {
    const fetchTodos = async () => {
      try {
        await axios
          .get('http://localhost:5000/api/todos')
          .then(response => setTodos(response.data))
      } catch (error) {
        console.error('Error fetching todos:', error)
      }
    }
    fetchTodos()
  }, [input])

  const addTodo = e => {
    e.preventDefault()
    if (!input) return
    axios
      .post('http://localhost:5000/api/todos', { todo: input })
      .then(res => {
        setTodos([...todos, res.data])
        setInput('')
      })
      .catch(error => {
        console.error('Error adding todo:', error)
      })
  }
  console.log(todos)
  return (
    <div className="app">
      <h1>TODO React Mongoose</h1>
      <FormControl>
        <InputLabel>Escrever uma Tarefa</InputLabel>
        <Input value={input} onChange={e => setInput(e.target.value)} />
      </FormControl>
      <Button
        type="submit"
        onClick={addTodo}
        variant="contained"
        color="primary"
        disabled={!input}
      >
        Adicionar Tarefa
      </Button>
      <ul>
        {todos.map(it => (
          <Todo key={it._id} arr={it} />
        ))}
      </ul>
    </div>
  )
}

export default App
