import './styles.css'

export default function Button({
  text,
  width ,
  height ,
  backgroundColor = 'bg-red-500',
  hoverColor = 'hover:bg-red-600',
  type ,
  className = ''
}) {
  return (
    <button
      type={type}
      className={`custom-button rounded-lg p-2 text-white ${className} ${width} ${height} ${backgroundColor} ${hoverColor}`}
    >
      {text}
    </button>
  )
}
