import { useRef, useContext, createContext } from 'react'
import { StepContext } from '../App'

export default function Step({ task, stepRef }) {
  const { handleToggleStep, handleDeleteStep } = useContext(StepContext)
  return (
    <ul>
      {task.steps.map(step => (
        <li key={step.id} className="flex items-center mb-1">
          <input
            type="checkbox"
            checked={step.completed}
            onChange={() => handleToggleStep(task.id,step.id)}
            className="mr-2"
          />
          <span
            className={`flex-1 text-black ${
              step.completed ? 'line-through text-gray-500' : ''
            }`}
          >
            {step.text}
          </span>
          <button
            onClick={() => handleDeleteStep(task.id,step.id)}
            className="text-red-500"
          >
            Delete
          </button>
        </li>
      ))}
    </ul>
  )
}
