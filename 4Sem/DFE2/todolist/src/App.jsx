// App.jsx
import { useState, useEffect } from 'react'
import Task from './components/Task'

export default function App() {
  const [tasks, setTasks] = useState([])
  const [title, setTitle] = useState('')
  const [description, setDescription] = useState('')

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
    if (title.trim() === '' || description.trim() === '') return
    const newTask = { id: Date.now(), title, description, steps: [] }
    setTasks([...tasks, newTask])
    setTitle('')
    setDescription('')
  }

  const handleRemoveTask = id => {
    const newTasks = tasks.filter(task => task.id !== id)
    setTasks(newTasks)
  }

  const handleAddStep = (taskId, stepText) => {
    if (stepText.trim() === '') return
    const newTasks = tasks.map(task => {
      if (task.id === taskId) {
        // Correção aqui
        return {
          ...task,
          steps: [
            ...task.steps,
            { id: Date.now(), text: stepText, completed: false }
          ]
        }
      }
      return task
    })
    setTasks(newTasks)
  }

  const handleToggleStep = (taskId, stepId) => {
    const newTasks = tasks.map(task => {
      if (task.id === taskId) {
        const updatedSteps = task.steps.map(step =>
          step.id === stepId ? { ...step, completed: !step.completed } : step
        )
        const allStepsCompleted = updatedSteps.every(step => step.completed)
        return { ...task, steps: updatedSteps, completed: allStepsCompleted }
      }
      return task
    })
    setTasks(newTasks)
  }

  const handleDeleteStep = (taskId, stepId) => {
    const newTasks = tasks.map(task => {
      if (task.id === taskId) {
        const updatedSteps = task.steps.filter(step => step.id !== stepId)
        const allStepsCompleted =
          updatedSteps.length > 0 && updatedSteps.every(step => step.completed)
        return { ...task, steps: updatedSteps, completed: allStepsCompleted }
      }
      return task
    })
    setTasks(newTasks)
  }

  return (
    <div className="container mx-auto p-4">
      <h1 className="text-3xl font-bold mb-4">Todo List</h1>
      <div className="mb-6">
        <input
          type="text"
          value={title}
          onChange={e => setTitle(e.target.value)}
          placeholder="Título da tarefa"
          className="p-2 border border-gray-300 rounded w-full mb-2"
        />
        <textarea
          value={description}
          onChange={e => setDescription(e.target.value)}
          placeholder="Descrição da tarefa"
          className="p-2 border border-gray-300 rounded w-full mb-2"
        />
        <button
          onClick={handleAddTask}
          className="bg-blue-500 text-white px-4 py-2 rounded"
        >
          Adicionar Tarefa
        </button>
      </div>
      <ul>
        {tasks.map(task => (
          <Task
            key={task.id}
            task={task}
            onRemove={() => handleRemoveTask(task.id)}
            onAddStep={stepText => handleAddStep(task.id, stepText)}
            onToggleStep={stepId => handleToggleStep(task.id, stepId)}
            onDeleteStep={stepId => handleDeleteStep(task.id, stepId)}
          />
        ))}
      </ul>
    </div>
  )
}
