<?php
namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class OnboardingController extends Controller
{
    public function index()
    {
        return Inertia::render('Onboarding/Index');
    }

    public function success()
    {
        return Inertia::render('Onboarding/Success');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'            => 'required|string|max:255',
            'nombre_corto'      => 'required|string|max:100',
            'nit'               => 'required|string',
            'telefono'          => 'required|string',
            'direccion'         => 'required|string',
            'ciudad'            => 'required|string',
            'pais'              => 'required|string',
            'encargado_nombre'  => 'required|string',
            'encargado_email'   => 'required|email',
            'encargado_telefono'=> 'required|string',
            'plan'              => 'required|in:mensual,anual',
            'rut_document'      => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'camara_comercio'   => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'escudo_url'        => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'nombre', 'nombre_corto', 'nit', 'telefono',
            'direccion', 'ciudad', 'pais', 'encargado_nombre',
            'encargado_email', 'encargado_telefono', 'plan',
        ]);

        // Subir archivos
        if ($request->hasFile('escudo_url')) {
            $data['escudo_url'] = $request->file('escudo_url')
                ->store('tenants/logos', 'public');
        }

        $data['rut_document']    = $request->file('rut_document')
            ->store('tenants/documentos', 'local');
        $data['camara_comercio'] = $request->file('camara_comercio')
            ->store('tenants/documentos', 'local');

        // Estado pendiente + subdominio temporal
        $data['estado']     = 'pendiente';
        $data['subdominio'] = Str::slug($request->nombre_corto);

        $tenant = Tenant::create($data);

        // Notificar al admin
        app(\App\Services\ApprovalService::class)->notifyAdmin($tenant);

        return redirect()->route('onboarding.success');
    }
}