<!DOCTYPE html>
<html>
<head>
    <title>Solicitar Acceso</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">

    <h2 class="text-2xl font-bold mb-6 text-center">
        Solicitud de Acceso al Sistema
    </h2>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif  

    <form method="POST" action="{{ route('tenant.request.store') }}">
        @csrf

        <div class="grid grid-cols-2 gap-4">

            <div>
                <label>Nombre del Club *</label>
                <input type="text" name="nombre" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label>NIT *</label>
                <input type="text" name="nit" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label>Tipo de Club *</label>
                <select name="tipo_club" class="w-full border p-2 rounded" required>
                    <option value="">Seleccione</option>
                    <option value="formativo">Formativo</option>
                    <option value="amateur">Amateur</option>
                    <option value="profesional">Profesional</option>
                </select>
            </div>

            <div>
                <label>Ciudad *</label>
                <input type="text" name="ciudad" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label>País *</label>
                <input type="text" name="pais" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label>Email Corporativo *</label>
                <input type="email" name="email_corporativo" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label>Nombre del Encargado *</label>
                <input type="text" name="encargado_nombre" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label>Email del Encargado *</label>
                <input type="email" name="encargado_email" class="w-full border p-2 rounded" required>
            </div>

        </div>

        <button class="mt-6 w-full bg-blue-600 text-white p-3 rounded hover:bg-blue-700">
            Enviar Solicitud
        </button>

    </form>

</div>

</body>
</html>