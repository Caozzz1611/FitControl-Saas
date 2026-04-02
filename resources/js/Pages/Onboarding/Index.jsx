import { useState } from 'react'
import { router } from '@inertiajs/react'
import StepClub from '../../src/components/onboarding/StepClub'
import StepDocumentos from '../../src/components/onboarding/StepDocumentos'
import StepPlan from '../../src/components/onboarding/StepPlan'

const STEPS = ['Datos del club', 'Documentos', 'Plan']

export default function OnboardingIndex() {
  const [step, setStep] = useState(0)
  const [loading, setLoading] = useState(false)
  const [errors, setErrors] = useState({})

 const [formData, setFormData] = useState({
  nombre: '',
  nombre_corto: '',
  nit: '',
  telefono: '',
  direccion: '',
  ciudad: '',
  pais: 'Colombia',
  encargado_nombre: '',
  encargado_email: '',
  encargado_telefono: '',
  escudo_url: null,
  rut_document: null,
  camara_comercio: null,
  plan: '',
})

  const updateData = (fields) => setFormData(prev => ({ ...prev, ...fields }))
  const next = () => setStep(s => s + 1)
  const back = () => setStep(s => s - 1)

  const submit = () => {
    setLoading(true)
    router.post('/onboarding', formData, {
      forceFormData: true,
      onSuccess: () => router.visit('/onboarding/success'),
      onError: (errs) => {
        setErrors(errs)
        setLoading(false)
      },
      onFinish: () => setLoading(false),
    })
  }

  return (
    <div className="min-h-screen bg-gray-50 flex flex-col items-center justify-center py-12 px-4">

      <div className="text-center mb-8">
        <h1 className="text-3xl font-bold text-gray-900">FitControl</h1>
        <p className="text-gray-500 mt-1">Solicitud de acceso para tu club</p>
      </div>

      <div className="flex items-center gap-2 mb-8">
        {STEPS.map((label, i) => (
          <div key={i} className="flex items-center gap-2">
            <div className={`flex items-center justify-center w-8 h-8 rounded-full text-sm font-medium transition-all
              ${i < step ? 'bg-green-500 text-white' : i === step ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-500'}`}>
              {i < step ? '✓' : i + 1}
            </div>
            <span className={`text-sm hidden sm:block ${i === step ? 'text-blue-600 font-medium' : 'text-gray-400'}`}>
              {label}
            </span>
            {i < STEPS.length - 1 && (
              <div className={`w-12 h-0.5 ${i < step ? 'bg-green-500' : 'bg-gray-200'}`} />
            )}
          </div>
        ))}
      </div>

      <div className="bg-white rounded-2xl shadow-sm border border-gray-100 w-full max-w-lg p-8">
        {step === 0 && <StepClub data={formData} onChange={updateData} onNext={next} errors={errors} />}
        {step === 1 && <StepDocumentos data={formData} onChange={updateData} onNext={next} onBack={back} errors={errors} />}
        {step === 2 && <StepPlan data={formData} onChange={updateData} onBack={back} onSubmit={submit} loading={loading} errors={errors} />}
      </div>

      <p className="text-gray-400 text-xs mt-6">
        ¿Ya tienes cuenta?{' '}
        <a href="/login" className="text-blue-600 hover:underline">Inicia sesión</a>
      </p>
    </div>
  )
}