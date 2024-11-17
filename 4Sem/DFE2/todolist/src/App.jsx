// App.jsx
import { useState, useEffect, useRef } from 'react'
import Task from './components/Task'

export default function App() {
  const [tasks, setTasks] = useState([])
  const title = useRef()
  const description = useRef()

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
    const newTask = {
      id: Date.now(),
      title: title.current.value,
      description: description.current.value,
      completed: false,
      steps: []
    }
    setTasks([...tasks, newTask])
    title.current.value = ''
    description.current.value = ''
  }

  const handleRemoveTask = id => {
    const newTasks = tasks.filter(task => task.id !== id)
    setTasks(newTasks)
  }

  const handleAddStep = (taskId, stepText) => {
    if (stepText.trim() === '') return
    const newTasks = tasks.map(task => {
      if (task.id === taskId) {
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
          ref={title}
          placeholder="Título da tarefa"
          className="p-2 border border-gray-300 rounded w-full mb-2"
        />
        <textarea
          ref={description}
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
