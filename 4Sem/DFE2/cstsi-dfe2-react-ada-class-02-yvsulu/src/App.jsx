import './App.css'
import AdaClass from './AdaClass.jsx'
import Ada from './Ada'
import { useState, useEffect } from 'react'
import Cientist from './Cientist'
const cientists = [
  {
    name: 'Ada',
    surname: 'Lovelace',
    wiki: 'https://pt.wikipedia.org/wiki/Ada_Lovelace',
    imageUrl:
      'https://upload.wikimedia.org/wikipedia/commons/0/0f/Ada_lovelace.jpg',
    imageSize: 100
  },
  {
    name: 'Albert',
    surname: 'Einstein',
    wiki: 'https://pt.wikipedia.org/wiki/Albert_Einstein',
    imageUrl:
      'https://upload.wikimedia.org/wikipedia/commons/7/75/Einstein1921_by_F_Schmutzer_3.jpg',
    imageSize: 100
  }
]

function App() {
  const [show, setShow] = useState(true)
  useEffect(() => {}, [show])

  return (
    <>
      {cientists.map(cientist => (
        <div key={cientist.name}>
          <Cientist cientist={cientist} />
          <button onClick={() => setShow(!show)}>
            {show ? 'Remover' : 'Mostrar'} {cientist.name}
          </button>
        </div>
      ))}
    </>
  )
}

export default App
