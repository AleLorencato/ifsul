import React, { useContext } from 'react'
import { CountContext } from '../App'

export default function Text() {
  const text = useContext(CountContext)
  
  return (
    <div>
      <h2>Texto do Contexto:</h2>
      <p>{text}</p>
    </div>
  )
}
