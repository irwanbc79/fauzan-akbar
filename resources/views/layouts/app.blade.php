<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sahabat Ilmu PMI – Majelis Ilmu untuk Pekerja Migran Indonesia di Hong Kong. Kajian Islam, artikel, video rekaman, dan komunitas dakwah digital.">
    <meta name="author" content="Sahabat Ilmu PMI">
    <title>@yield('title', 'Sahabat Ilmu PMI – Majelis Ilmu PMI Hong Kong')</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="font-sans bg-cream text-body overflow-x-hidden antialiased">

    {{-- NAVBAR --}}
    @include('components.navbar')

    {{-- MAIN CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('components.footer')

    {{-- Flash Messages --}}
    @if(session('success'))
    <div id="flash-success" class="fixed bottom-6 right-6 z-50 bg-teal text-white px-6 py-4 rounded-xl shadow-2xl max-w-sm animate-fade-up">
        <div class="flex items-center gap-3">
            <span class="text-xl">✅</span>
            <p class="text-sm font-medium">{{ session('success') }}</p>
        </div>
        <button onclick="this.parentElement.remove()" class="absolute top-2 right-3 text-white/60 hover:text-white text-lg">&times;</button>
    </div>
    <script>setTimeout(() => document.getElementById('flash-success')?.remove(), 5000);</script>
    @endif

    @stack('scripts')
</body>
</html>
