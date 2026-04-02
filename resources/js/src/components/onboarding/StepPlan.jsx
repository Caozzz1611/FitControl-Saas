const PLANES = [
  {
    id: 'mensual',
    nombre: 'Mensual',
    precio: '$150.000',
    periodo: 'por mes',
    badge: null,
    features: ['Jugadores ilimitados', 'Reportes básicos', 'Soporte por email'],
  },
  {
    id: 'anual',
    nombre: 'Anual',
    precio: '$1.500.000',
    periodo: 'por año',
    badge: '2 meses gratis',
    features: ['Todo lo del mensual', 'Reportes avanzados', 'Soporte prioritario'],
  },
]

export default function StepPlan({ data, onChange, onBack, onSubmit, loading, errors }) {
  const handleSubmit = (e) => {
    e.preventDefault()
    onSubmit()
  }

  return (
    <form onSubmit={handleSubmit} className="space-y-4">
      <h2 className="text-xl font-semibold text-gray-800 mb-6">Elige tu plan</h2>

      <div className="grid grid-cols-2 gap-3">
        {PLANES.map(plan => (
          <div
            key={plan.id}
            onClick={() => onChange({ plan: plan.id })}
            className={`relative border-2 rounded-xl p-4 cursor-pointer transition
              ${data.plan === plan.id ? 'border-blue-600 bg-blue-50' : 'border-gray-200 hover:border-gray-300'}`}>

            {plan.badge && (
              <span className="absolute -top-2.5 left-1/2 -translate-x-1/2 bg-green-500 text-white text-xs px-2 py-0.5 rounded-full whitespace-nowrap">
                {plan.badge}
              </span>
            )}

            <p className="font-semibold text-gray-800">{plan.nombre}</p>
            <p className="text-2xl font-bold text-blue-600 mt-1">{plan.precio}</p>
            <p className="text-xs text-gray-400 mb-3">{plan.periodo}</p>

            <ul className="space-y-1">
              {plan.features.map((f, i) => (
                <li key={i} className="text-xs text-gray-500 flex items-center gap-1">
                  <span className="text-green-500">✓</span> {f}
                </li>
              ))}
            </ul>

            {data.plan === plan.id && (
              <div className="absolute top-2 right-2 w-5 h-5 bg-blue-600 rounded-full flex items-center justify-center">
                <span className="text-white text-xs">✓</span>
              </div>
            )}
          </div>
        ))}
      </div>

      {errors.plan && <p className="text-red-500 text-xs mt-1">{errors.plan}</p>}

      {data.plan && (
        <div className="bg-gray-50 rounded-lg p-4 text-sm text-gray-600 space-y-1 border border-gray-100">
          <p className="font-medium text-gray-800 mb-2">Resumen de tu solicitud</p>
          <p><span className="text-gray-400">Club:</span> {data.nombre}</p>
          <p><span className="text-gray-400">NIT:</span> {data.nit}</p>
          <p><span className="text-gray-400">Encargado:</span> {data.encargado_nombre}</p>
          <p><span className="text-gray-400">Email:</span> {data.encargado_email}</p>
          <p><span className="text-gray-400">Plan:</span> {data.plan === 'mensual' ? 'Mensual — $150.000/mes' : 'Anual — $1.500.000/año'}</p>
        </div>
      )}

      <p className="text-xs text-gray-400 text-center">
        Al enviar aceptas nuestros{' '}
        <a href="/terminos" className="text-blue-600 hover:underline">términos y condiciones</a>
      </p>

      <div className="flex gap-3">
        <button type="button" onClick={onBack}
          className="flex-1 border border-gray-200 text-gray-600 py-2.5 rounded-lg font-medium hover:bg-gray-50 transition">
          ← Atrás
        </button>
        <button
          type="submit"
          disabled={!data.plan || loading}
          className="flex-1 bg-blue-600 text-white py-2.5 rounded-lg font-medium hover:bg-blue-700 transition disabled:opacity-50 disabled:cursor-not-allowed">
          {loading ? 'Enviando...' : 'Enviar solicitud'}
        </button>
      </div>
    </form>
  )
}