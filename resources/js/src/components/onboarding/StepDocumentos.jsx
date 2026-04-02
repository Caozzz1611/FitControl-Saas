function FileField({ id, label, hint, accept, value, onChange, error }) {
  return (
    <div>
      <label className="block text-sm font-medium text-gray-700 mb-1">{label}</label>
      <div
        className={`border-2 border-dashed rounded-lg p-4 text-center cursor-pointer transition
          ${value ? 'border-green-300 bg-green-50' : 'border-gray-200 hover:border-gray-300'}`}
        onClick={() => document.getElementById(id).click()}>
        {value ? (
          <div className="flex items-center justify-center gap-2 text-green-600 text-sm">
            <span>✓</span><span>{value.name}</span>
          </div>
        ) : (
          <div className="text-gray-400 text-sm">
            <p>Haz clic para subir</p>
            <p className="text-xs mt-1">{hint}</p>
          </div>
        )}
        <input id={id} type="file" accept={accept} className="hidden" onChange={onChange} />
      </div>
      {error && <p className="text-red-500 text-xs mt-1">{error}</p>}
    </div>
  )
}

export default function StepDocumentos({ data, onChange, onNext, onBack, errors }) {
  const handleSubmit = (e) => {
    e.preventDefault()
    onNext()
  }

  return (
    <form onSubmit={handleSubmit} className="space-y-4">
      <h2 className="text-xl font-semibold text-gray-800 mb-6">Documentos legales</h2>

      <div>
        <label className="block text-sm font-medium text-gray-700 mb-1">RUT / NIT</label>
        <input
          type="text" required
          value={data.nit}
          onChange={e => onChange({ nit: e.target.value })}
          placeholder="900123456-1"
          className="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        {errors.nit && <p className="text-red-500 text-xs mt-1">{errors.nit}</p>}
      </div>

      <div>
        <label className="block text-sm font-medium text-gray-700 mb-1">Nombre del encargado</label>
        <input
          type="text" required
          value={data.encargado_nombre}
          onChange={e => onChange({ encargado_nombre: e.target.value })}
          placeholder="Juan Pérez"
          className="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        {errors.encargado_nombre && <p className="text-red-500 text-xs mt-1">{errors.encargado_nombre}</p>}
      </div>

      <div>
        <label className="block text-sm font-medium text-gray-700 mb-1">Email del encargado</label>
        <input
          type="email" required
          value={data.encargado_email}
          onChange={e => onChange({ encargado_email: e.target.value })}
          placeholder="juan@miclub.com"
          className="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        {errors.encargado_email && <p className="text-red-500 text-xs mt-1">{errors.encargado_email}</p>}
      </div>

      <div>
        <label className="block text-sm font-medium text-gray-700 mb-1">Teléfono del encargado</label>
        <input
          type="tel" required
          value={data.encargado_telefono}
          onChange={e => onChange({ encargado_telefono: e.target.value })}
          placeholder="+57 300 000 0000"
          className="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        {errors.encargado_telefono && <p className="text-red-500 text-xs mt-1">{errors.encargado_telefono}</p>}
      </div>

      <FileField
        id="rut-input"
        label="Documento RUT"
        hint="PDF, JPG o PNG — máx 5MB"
        accept="application/pdf,image/jpeg,image/png"
        value={data.rut_document}
        onChange={e => onChange({ rut_document: e.target.files[0] })}
        error={errors.rut_document}
      />

      <FileField
        id="camara-input"
        label="Cámara de comercio"
        hint="PDF, JPG o PNG — máx 5MB"
        accept="application/pdf,image/jpeg,image/png"
        value={data.camara_comercio}
        onChange={e => onChange({ camara_comercio: e.target.files[0] })}
        error={errors.camara_comercio}
      />

      <div className="flex gap-3 mt-2">
        <button type="button" onClick={onBack}
          className="flex-1 border border-gray-200 text-gray-600 py-2.5 rounded-lg font-medium hover:bg-gray-50 transition">
          ← Atrás
        </button>
        <button type="submit"
          className="flex-1 bg-blue-600 text-white py-2.5 rounded-lg font-medium hover:bg-blue-700 transition">
          Siguiente →
        </button>
      </div>
    </form>
  )
}