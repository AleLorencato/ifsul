// Task.jsx
import { useRef } from 'react'

export default function Task({
  task,
  onRemove,
  onAddStep,
  onToggleStep,
  onDeleteStep
}) {
  const stepRef = useRef()

  const handleAddStep = () => {
    onAddStep(stepRef.current.value)
    stepRef.current.value = ''
  }

  return (
    <li
      className={`mb-4 p-4 border rounded ${
        task.completed ? 'bg-green-100' : 'bg-white'
      }`}
    >
      <div className="flex justify-between items-center">
        <div>
          <h2 className="text-xl font-bold">{task.title}</h2>
          <p className="text-gray-600">{task.description}</p>
        </div>
        <button onClick={onRemove} className="text-red-500">
          Remover
        </button>
      </div>
      <div className="mt-4">
        <div className="flex mb-2">
          <input
            ref={stepRef}
            type="text"
            placeholder="Adicionar etapa"
            className="p-2 border border-gray-300 rounded flex-1 mr-2"
          />
          <button
            onClick={handleAddStep}
            className="bg-green-500 text-white px-3 py-2 rounded"
          >
            Adicionar
          </button>
        </div>
        <ul>
          {task.steps.map(step => (
            <li key={step.id} className="flex items-center mb-1">
              <input
                type="checkbox"
                checked={step.completed}
                onChange={() => onToggleStep(step.id)}
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
                onClick={() => onDeleteStep(step.id)}
                className="text-red-500"
              >
                Delete
              </button>
            </li>
          ))}
        </ul>
      </div>
    </li>
  )
}
