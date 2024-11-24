import { useState, useEffect, useRef, createContext } from 'react'
import Task from './components/Task'

export const StepContext = createContext({
  handleAddStep: () => {},
  handleToggleStep: () => {},
  handleDeleteStep: () => {}
})

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
        const updatedSteps = task.steps.map(step => {
          if (step.id === stepId) {
            return { ...step, completed: !step.completed }
          }
          return step
        })
        return { ...task, steps: updatedSteps }
      }
      return task
    })
    setTasks(newTasks)
  }

  const handleDeleteStep = (taskId, stepId) => {
    const newTasks = tasks.map(task => {
      if (task.id === taskId) {
        const updatedSteps = task.steps.filter(step => step.id !== stepId)
        return { ...task, steps: updatedSteps }
      }
      return task
    })
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
