import { List, ListItem, ListItemAvatar, ListItemText } from '@mui/material'
import DeleteIcon from '@mui/icons-material/Delete'
import './Todo.css'
import axios from 'axios'
const Todo = ({ arr }) => {
  return (
    <List className="todo__list">
      <ListItem>
        <ListItemAvatar />
        <ListItemText primary={arr.todo} secondary={arr.todo} />
      </ListItem>
      <DeleteIcon
        fontSize="large"
        onClick={() => {
          axios
            .delete('http://localhost:5000/api/todos/', {
              data: { id: arr._id }
            })
            .then(res => {
              console.log('Todo deleted:', res.data)
              window.location.reload()
            })
            .catch(error => {
              console.error('Error deleting todo:', error)
            })
        }}
      />
    </List>
  )
}
export default Todo
