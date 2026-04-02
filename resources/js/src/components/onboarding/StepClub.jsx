export default function StepClub({ data, onChange, onNext, errors }) {
  const handleSubmit = (e) => {
    e.preventDefault()
    onNext()
  }

  return (
    <form onSubmit={handleSubmit} className="space-y-4">
      <h2 className="text-xl font-semibold text-gray-800 mb-6">Datos del club</h2>

      <div>
        <label className="block text-sm font-medium text-gray-700 mb-1">Nombre del club</label>
        <input
          type="text" required
          value={data.nombre}
          onChange={e => onChange({ nombre: e.target.value })}
          placeholder="Club Deportivo Ejemplo"
          className="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        {errors.nombre && <p className="text-red-500 text-xs mt-1">{errors.nombre}</p>}
      </div>

      <div>
        <label className="block text-sm font-medium text-gray-700 mb-1">Nombre corto</label>
        <input
          type="text" required
          value={data.nombre_corto}
          onChange={e => onChange({ nombre_corto: e.target.value })}
          placeholder="CDE"
          className="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        {errors.nombre_corto && <p className="text-red-500 text-xs mt-1">{errors.nombre_corto}</p>}
      </div>

      <div className="grid grid-cols-2 gap-3">
        <div>
          <label className="block text-sm font-medium text-gray-700 mb-1">Ciudad</label>
          <input
            type="text" required
            value={data.ciudad}
            onChange={e => onChange({ ciudad: e.target.value })}
            placeholder="Bogotá"
            className="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
          {errors.ciudad && <p className="text-red-500 text-xs mt-1">{errors.ciudad}</p>}
        </div>

        <div>
          <label className="block text-sm font-medium text-gray-700 mb-1">País</label>
          <input
            type="text" required
            value={data.pais}
            onChange={e => onChange({ pais: e.target.value })}
            placeholder="Colombia"
            className="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
          {errors.pais && <p className="text-red-500 text-xs mt-1">{errors.pais}</p>}
        </div>
      </div>

      <div>
        <label className="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
        <input
          type="text" required
          value={data.direccion}
          onChange={e => onChange({ direccion: e.target.value })}
          placeholder="Calle 123 # 45-67"
          className="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        {errors.direccion && <p className="text-red-500 text-xs mt-1">{errors.direccion}</p>}
      </div>

      <div>
        <label className="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
        <input
          type="tel" required
          value={data.telefono}
          onChange={e => onChange({ telefono: e.target.value })}
          placeholder="+57 300 000 0000"
          className="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        {errors.telefono && <p className="text-red-500 text-xs mt-1">{errors.telefono}</p>}
      </div>

      <div>
        <label className="block text-sm font-medium text-gray-700 mb-1">
          Escudo del club <span className="text-gray-400 font-normal">(opcional)</span>
        </label>
        <div
          className={`border-2 border-dashed rounded-lg p-4 text-center cursor-pointer transition
            ${data.escudo_url ? 'border-blue-300 bg-blue-50' : 'border-gray-200 hover:border-gray-300'}`}
          onClick={() => document.getElementById('escudo-input').click()}>
          {data.escudo_url ? (
            <div className="flex items-center justify-center gap-2 text-blue-600 text-sm">
              <span>✓</span><span>{data.escudo_url.name}</span>
            </div>
          ) : (
            <div className="text-gray-400 text-sm">
              <p>Haz clic para subir tu escudo</p>
              <p className="text-xs mt-1">PNG o JPG, máx 2MB</p>
            </div>
          )}
          <input
            id="escudo-input" type="file"
            accept="image/png,image/jpeg"
            className="hidden"
            onChange={e => onChange({ escudo_url: e.target.files[0] })}
          />
        </div>
        {errors.escudo_url && <p className="text-red-500 text-xs mt-1">{errors.escudo_url}</p>}
      </div>

      <button type="submit"
        className="w-full bg-blue-600 text-white py-2.5 rounded-lg font-medium hover:bg-blue-700 transition mt-2">
        Siguiente →
      </button>
    </form>
  )
}