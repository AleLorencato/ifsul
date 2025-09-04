import mongoose from 'mongoose'

await mongoose.connect('mongodb://127.0.0.1/todos')

const todoSchema = new mongoose.Schema({
  id: Number,
  todo: String,
  timestamp: {
    type: Date,
    default: Date.now
  }
})

export const Todos = mongoose.model('Todos', todoSchema)
