import { Link } from '@inertiajs/react'

export default function Success() {
  return (
    <div className="min-h-screen bg-gray-50 flex items-center justify-center px-4">
      <div className="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 max-w-md w-full text-center">
        <div className="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-5">
          <span className="text-green-600 text-3xl">✓</span>
        </div>
        <h1 className="text-2xl font-bold text-gray-900 mb-2">¡Solicitud enviada!</h1>
        <p className="text-gray-500 mb-2">
          Revisaremos tu solicitud en las próximas <strong>24-48 horas hábiles</strong>.
        </p>
        <p className="text-gray-500 mb-8">
          Te enviaremos un correo cuando sea aprobada con el enlace para crear tus credenciales.
        </p>
        <Link
          href="/"
          className="block w-full border border-gray-200 text-gray-600 py-2.5 rounded-lg font-medium hover:bg-gray-50 transition text-center">
          Volver al inicio
        </Link>
      </div>
    </div>
  )
}