<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SYSEYEID - Inteligência Artificial na Oftalmologia</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .light-background { background-color: #c7d1d4; }
        .water-blue-background { background-color: #79b6c8; }
        .light-text { color: #061722; }
    </style>
</head>
<body class="light-background light-text font-sans">

    <!-- Header -->
    <header class="water-blue-background light-text">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <a href="#" class="flex items-center space-x-3">
                <img src="{{ asset('images/syseyeidLogo.png') }}" alt="Logo" class="h-10 w-10 rounded-full">
                <span class="font-bold text-lg">SYS EYE ID</span>
            </a>
            <nav class="hidden md:flex space-x-6">
                <a href="{{ route('login') }}" class="hover:text-gray-300">Login</a>
                <a href="{{ route('register') }}" class="hover:text-gray-300">Cadastre-se</a>
            </nav>
            <button class="md:hidden text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative water-blue-background light-text h-80 md:h-96 flex items-center justify-center">
        <img src="{{ asset('images/olho.jpg') }}" alt="Fundo" class="absolute inset-0 w-full h-full object-cover opacity-30">
        <div class="relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white">SYS EYE ID</h1>
            <p class="text-lg md:text-2xl text-gray-200 mt-4">Inteligência artificial na oftalmologia</p>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 light-background light-text">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center light-text">Como podemos ajudar você?</h2>
            <p class="text-center light-text mt-4">Explore os benefícios da tecnologia em seus exames oftalmológicos.</p>
            <div class="mt-10 grid gap-8 grid-cols-1 md:grid-cols-2">
                <div class="water-blue-background p-6 rounded-lg shadow-md text-center">
                    <img src="{{ asset('images/medico.jpg') }}" alt="Feature 1" class="w-24 h-24 mx-auto mb-4 rounded-full object-cover">
                    <h3 class="font-bold text-lg light-text">Diagnósticos Precisos</h3>
                    <p class="light-text mt-2">Utilize inteligência artificial para obter diagnósticos confiáveis e rápidos.</p>
                </div>
                <div class="water-blue-background p-6 rounded-lg shadow-md text-center">
                    <img src="{{ asset('images/tec.png') }}" alt="Feature 2" class="w-24 h-24 mx-auto mb-4 rounded-full object-cover">
                    <h3 class="font-bold text-lg light-text">Facilidade no Uso</h3>
                    <p class="light-text mt-2">Uma interface simples e intuitiva para médicos e pacientes.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 light-background light-text text-center">
        <h2 class="text-3xl font-bold">Pronto para transformar a forma como você realiza diagnósticos?</h2>
        <p class="text-lg mt-4">Junte-se aos profissionais que já estão inovando com a SYS EYE ID.</p>
        <a href="{{ route('register') }}" class="mt-6 inline-block-blue-600 py-3 px-6 rounded-full hover:bg-blue-500">Cadastre-se Agora</a>
    </section>

    <!-- Footer -->
    <footer class="water-blue-background light-text py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 SYS EYE ID. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
