import { useState, useEffect } from 'react'
import { Button, FormControl, Input, InputLabel } from '@mui/material'
import { db } from './firebase'
import firebase from 'firebase/compat/app'
import './App.css'
import Todo from './components/Todo'
function App() {
  const [todos, setTodos] = useState([
    'Criar um projeto no firebase',
    'Não esquecer de gravar as etapas'
  ])
  const [input, setInput] = useState('')
  const addTodo = e => {
    e.preventDefault()
    db.collection('todos').add({
      todo: input,
      timestamp: firebase.firestore.FieldValue.serverTimestamp()
    })
    setInput('')
  }

  useEffect(() => {
    db.collection('todos')
      .orderBy('timestamp', 'desc')
      .onSnapshot(snapshot => {
        setTodos(snapshot.docs.map(doc => ({ id: doc.id, item: doc.data() })))
      })
  }, [input])

  return (
    <div className="App">
      <h1>TODO React Firestore</h1>
      <FormControl>
        <InputLabel value={input} onChange={e => setInput(e.target.value)} />
        <Input
          value={input}
          onChange={e => setInput(e.target.value)}
          placeholder="Digite o seu TODO"
          type="text"
        />
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
        {todos.map(item => (
          <Todo key={item.id} arr={item} />
        ))}
      </ul>
    </div>
  )
}

export default App
