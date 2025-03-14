import { useState, useEffect, useRef, createContext } from 'react'
import Task from './components/Task'



export default function App() {
  const [tasks, setTasks] = useState([])
  const titleRef = useRef()
  const descriptionRef = useRef()

  useEffect(() => {
    const storedTasks = localStorage.getItem('tasks')
    if (storedTasks) {
      setTasks(JSON.parse(storedTasks))
    }
  }, [])

  useEffect(() => {
    localStorage.setItem('tasks', JSON.stringify(tasks))
  }, [tasks])

  const handleAddTask = () => {
    if (
      titleRef.current.value.trim() === '' ||
      descriptionRef.current.value === ''
    )
      return
    const newTask = {
      id: Date.now(),
      title: titleRef.current.value,
      description: descriptionRef.current.value,
      completed: false,
      steps: []
    }
    setTasks([...tasks, newTask])
    titleRef.current.value = ''
    descriptionRef.current.value = ''
  }

  const handleRemoveTask = id => {
    const newTasks = tasks.filter(task => task.id !== id)
    setTasks(newTasks)
  }

  

  return (
    <div className="flex flex-col p-4 m-4">
      <h1>Todo List</h1>
      <input
        ref={titleRef}
        type="text"
        placeholder="Título"
        className="m-3 border-blue-500 rounded-xl p-2"
      />
      <input
        ref={descriptionRef}
        type="text"
        placeholder="Descrição"
        className="m-3 border-blue-500 rounded-xl p-2"
      />
      <button onClick={handleAddTask}>Adicionar Tarefa</button>
      <ul>
        {tasks.map(task => (
          <StepContext.Provider
            value={{ handleAddStep, handleToggleStep, handleDeleteStep }}
          >
            <Task
              key={task.id}
              task={task}
              onRemove={() => handleRemoveTask(task.id)}
            />
          </StepContext.Provider>
        ))}
      </ul>
    </div>
  )
}
