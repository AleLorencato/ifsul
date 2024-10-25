import './style.css'
export default function ProductRow({ product }) {
  const name = product.stocked ? (
    product.name
  ) : (
    <span className="batata">{product.name}</span>
  )
  return (
    <tr>
      <td>{name}</td>
      <td>{product.price}</td>
    </tr>
  )
}
