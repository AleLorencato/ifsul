import { useState, useEffect, useRef, useContext, createContext } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import Text from './components/Text'
import './App.css'

export const CountContext = createContext('')

function App() {
  const [count, setCount] = useState(0)
  const [text, setText] = useState('')
  const countRef = useRef(count)
  const inputText = useRef()

  const CountNumber = () => {
    setCount(count + 1)
  }

  const AddCountRef = () => {
    countRef.current++
    setCount(countRef.current)
  }
  const handleInputChange = () => {
    setText(inputText.current.value)
  }

  useEffect(() => {
    if (count === 10) {
      setCount(0)
    }
  }, [count])

  return (
    <>
      <div>
        <a href="https://vite.dev" target="_blank">
          <img src={viteLogo} className="logo" alt="Vite logo" />
        </a>
        <a href="https://react.dev" target="_blank">
          <img src={reactLogo} className="logo react" alt="React logo" />
        </a>
      </div>
      <h1>Vite + React</h1>
      <input
        type="text"
        name="text"
        id="text"
        ref={inputText}
        onChange={handleInputChange}
        placeholder="Digite algo..."
      />
      <CountContext.Provider value={text}>
        <Text />
      </CountContext.Provider>
      <div className="card">
        <button onClick={CountNumber}>count is {count}</button>
        <button onClick={AddCountRef}>countRef is {countRef.current}</button>
        <p>
          Edit <code>src/App.jsx</code> and save to test HMR
        </p>
      </div>
      <p className="read-the-docs">
        Click on the Vite and React logos to learn more
      </p>
    </>
  )
}

export default App
