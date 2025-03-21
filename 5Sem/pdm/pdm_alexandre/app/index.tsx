import { useEffect, useState } from 'react'
import { Button, Text, View } from 'react-native'
import {
  createUserWithEmailAndPassword,
  getAuth,
  signInWithEmailAndPassword
} from 'firebase/auth'
import { auth } from '../firebase/firebaseInit'

function Botao(props: any) {
  return <Button title={props.title} onPress={props.onPress} />
}

export default function Index() {
  const [count, setCount] = useState(0)

  

  useEffect(() => {
    login()
  }, [])

  useEffect(() => {
    console.log(`Count: ${count}`)
  }, [count])

  return (
    <View
      style={{
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center'
      }}
    >
      <Text>Count: {count}</Text>
      <Botao title="Incrementar" onPress={() => setCount(count + 1)} />
      <Botao title="Decrementar" onPress={() => setCount(count - 1)} />
    </View>
  )
}
