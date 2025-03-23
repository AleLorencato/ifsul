import Header from '../../components/Header'
import Footer from '../../components/Footer/Footer'
import Cars from '../../components/Cars'
import Sidebar from '../../components/Sidebar'

export function DashboardPage() {
  return (
    <div className="flex flex-col">
      <Header />
      <Sidebar />
      <main className="flex-1 ml-64 pt-20 p-4 overflow-y-auto">
        <Cars />
      </main>
      <Footer />
    </div>
  )
}
