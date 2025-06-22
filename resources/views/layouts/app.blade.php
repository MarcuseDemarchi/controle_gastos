<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Despesas Pessoais') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Conteúdo -->
        <main class="py-6 px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
            {{ $slot }}
        </main>
    </div>
</body>
</html>