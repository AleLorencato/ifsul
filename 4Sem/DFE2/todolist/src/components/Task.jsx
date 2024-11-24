import { useRef, useContext, createContext } from 'react'
import Step from './Step'
import { StepContext } from '../App'

export default function Task({ task, onRemove }) {
  const stepRef = useRef()

  const { handleAddStep } = useContext(StepContext)

  const addStep = () => {
    const stepText = stepRef.current.value
    handleAddStep(task.id, stepText)
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
          <h2 className="text-xl font-bold text-gray-800">{task.title}</h2>
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
            onClick={addStep}
            className="bg-green-500 text-white px-3 py-2 rounded"
          >
            Adicionar
          </button>
        </div>
        <Step task={task}></Step>
      </div>
    </li>
  )
}
