import {
  createBrowserRouter,
  Link,
  Outlet,
  RouterProvider
} from 'react-router-dom'
export default function Home() {
  return (
    <div>
      Exemplo de rotas aninhadas!
      <hr />
      <Outlet />
    </div>
  )
}
