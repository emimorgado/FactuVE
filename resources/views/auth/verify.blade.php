<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verifica tu correo</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl shadow-2xl text-center text-white max-w-md">
        <h1 class="text-3xl font-bold mb-4">Verifica tu correo ✉️</h1>
        <p class="mb-6">Te enviamos un enlace de verificación. Por favor revisa tu bandeja o spam.</p>
        @if (session('status') == 'verification-link-sent')
            <p class="text-green-400 mb-4">Se ha reenviado el enlace de verificación.</p>
        @endif
        <form action="{{ route('verification.send') }}" method="POST">
            @csrf
            <button class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 rounded-lg font-semibold transition">
                Reenviar correo
            </button>
        </form>
        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button class="text-gray-400 hover:text-red-400 text-sm">Cerrar sesión</button>
        </form>
    </div>
</body>
</html>
