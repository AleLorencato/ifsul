import './styles.css'
export default function Input({
  type,
  styles,
  name,
  value,
  placeholder,
  onChange,
  label
}) {
  return (
    <div className="input-group">
      <label htmlFor={name} className="input-label">
        {label}
      </label>
      <input
        type={type}
        name={name}
        id={name}
        value={value}
        placeholder={placeholder}
        onChange={onChange}
        className={`rounded-2xl font-normal w-full border p-2 mb-4 border-gray-300 ${styles}`}
      />
    </div>
  )
}
