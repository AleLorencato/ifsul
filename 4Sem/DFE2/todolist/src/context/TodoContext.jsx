export const StepContext = createContext({
  handleAddStep: () => {},
  handleToggleStep: () => {},
  handleDeleteStep: () => {}
})

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
