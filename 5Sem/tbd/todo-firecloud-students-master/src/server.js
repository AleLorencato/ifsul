import express from 'express'
import cors from 'cors'
import { Todos } from './models/db.js'

const app = express()

const PORT = process.env.PORT || 5000

app.use(cors())
app.use(express.json())
app.use(express.urlencoded({ extended: true }))
app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`)
})

app.get('/api/todos', async (req, res) => {
  try {
    const todos = await Todos.find()
    res.status(200).json(todos)
  } catch (error) {
    console.error('Error fetching todos:', error)
    res.status(500).json({ message: 'Internal Server Error' })
  }
})

app.post('/api/todos', async (req, res) => {
  const { todo } = req.body
  if (!todo) {
    return res.status(400).json({ message: 'Todo content is required' })
  }
  try {
    const newTodo = new Todos({ todo })
    await newTodo.save()
    res.status(201).json(newTodo)
  } catch (error) {
    console.error('Error creating todo:', error)
    res.status(500).json({ message: 'Internal Server Error' })
  }
})

app.delete('/api/todos/', async (req, res) => {
  await Todos.deleteOne({ _id: req.body.id })
  const todos = await Todos.find()
  if (!todos) {
    return res.status(404).json({ message: 'Todo not found' })
  }
  res.status(200).json({ message: 'Todo deleted successfully', todos })
})
