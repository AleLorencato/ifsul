import { Outlet } from 'react-router-dom'

export default function AuthContainer() {
  return (
    <div className="flex flex-col items-center justify-center h-screen ">
      <Outlet />
    </div>
  )
}
