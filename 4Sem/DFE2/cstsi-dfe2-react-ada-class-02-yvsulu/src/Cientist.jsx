import { useEffect, useState } from 'react'

// const _user = {
//   name: 'Ada',
//   imageUrl:
//     'https://upload.wikimedia.org/wikipedia/commons/0/0f/Ada_lovelace.jpg',
//   imageSize: 100,
// }

export default function Cientist({ cientist }) {
  const [user, setUser] = useState(cientist)
  const [countRender, setCountRender] = useState(1)

  useEffect(() => {
    console.log(countRender, 'render ' + user.name)
    return () => {
      console.log(`${user.name} será removida!!`)
    }
  }, [user])

  const changeData = () => {
    user.name = `${user.name} ${user.surname}`
    user.imageSize = 200
    setUser({ ...user })
    setCountRender(countRender + 1)
  }

  return (
    <>
      <a href={user.wiki} target="_blank">
        <img
          className="avatar"
          src={user.imageUrl}
          alt={'Photo of ' + user.name}
          style={{
            width: user.imageSize
          }}
          onClick={changeData}
        />
      </a>
      <h1>{user.name}</h1>
      <h2>{user.surname}</h2>
    </>
  )
}
