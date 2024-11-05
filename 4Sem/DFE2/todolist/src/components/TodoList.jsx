import { useState } from 'react'
export default function TodoList() {
  const [todos, setTodos] = useState([])
  const [input, setInput] = useState('')

  const handleAddTodo = () => {
    if (input.trim()) {
      setTodos([...todos, { text: input, completed: false }])
      setInput('')
    }
  }

  const handleToggleComplete = index => {
    const newTodos = todos.map((todo, i) => {
      if (i === index) {
        return { ...todo, completed: !todo.completed }
      } else {
        return todo
      }
    })
    setTodos(newTodos)
  }

  const handleDeleteTodo = index => {
    const newTodos = todos.filter((todo, i) => i !== index)
    setTodos(newTodos)
  }

  return (
    <ul>
      <li>
        <input
          type="text"
          value={input}
          onChange={e => setInput(e.target.value)}
          placeholder="Adicione um passo"
        />
        <button onClick={handleAddTodo}>Adicionar</button>
        {todos.map((todo, index) => (
          <li
            key={index}
            style={{
              textDecoration: todo.completed ? 'line-through' : 'none'
            }}
          >
            <input
              type="checkbox"
              checked={todo.completed}
              onChange={() => handleToggleComplete(index)}
            />
            <span>{todo.text}</span>
            <button onClick={() => handleDeleteTodo(index)}>Delete</button>
          </li>
        ))}
      </li>
    </ul>
  )
}
