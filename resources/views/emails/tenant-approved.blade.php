<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cuenta Aprobada</title>
</head>
<body style="font-family: Arial; background-color:#f4f6f9; padding:20px;">

    <div style="max-width:600px; margin:auto; background:white; padding:30px; border-radius:10px;">

        <h2 style="color:#16a34a;">🎉 ¡Bienvenido a FitControl SaaS!</h2>

        <p>Hola <strong>{{ $tenant->encargado_nombre }}</strong>,</p>

        <p>Tu solicitud ha sido aprobada correctamente.</p>

        <p>Ya puedes iniciar sesión en tu plataforma.</p>

        <div style="margin:20px 0;">
            <a href="{{ url('/admin') }}"
               style="background:#16a34a; color:white; padding:12px 20px; text-decoration:none; border-radius:5px;">
                Iniciar Sesión
            </a>
        </div>

        <p style="font-size:12px; color:gray;">
            © {{ date('Y') }} FitControl SaaS
        </p>

    </div>

</body>
</html>