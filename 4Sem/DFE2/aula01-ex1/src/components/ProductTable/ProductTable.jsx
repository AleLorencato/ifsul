import ProductCategoryRow from '../ProductRow/ProductCategoryRow'
import ProductRow from '../ProductRow/ProductRow'
import './style.css'
export default function ProductTable({ products }) {
  const rows = []
  let lastCategory = null

  products.map(product => {
    if (product.category !== lastCategory) {
      rows.push(
        <ProductCategoryRow
          key={product.category}
          category={product.category}
        />
      )
    }
    rows.push(<ProductRow key={product.name} product={product} />)
    lastCategory = product.category
  })

  return (
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>{rows}</tbody>
    </table>
  )
}
