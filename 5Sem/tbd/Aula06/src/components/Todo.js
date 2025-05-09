import { List, ListItem, ListItemAvatar, ListItemText } from '@mui/material'
import DeleteIcon from '@mui/icons-material/Delete'
import { db } from '../firebase'

export default function Todo({ arr }) {
  return (
    <List className="todo__list">
      <ListItem>
        <ListItemAvatar />
        <ListItemText primary={arr.item?.todo} secondary={arr.item?.todo} />
      </ListItem>
      <DeleteIcon
        onClick={() => {
          db.collection('todos').doc(arr.id).delete()
        }}
        className="todo__delete"
      ></DeleteIcon>
    </List>
  )
}
