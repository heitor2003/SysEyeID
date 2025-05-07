<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SysEyeID - Inteligência Artificial na Oftalmologia</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-medical-dark { background-color: #110436; } /* Azul escuro */
        .bg-medical-light { background-color: #F8FAFC; } /* Branco suave */
        .text-medical-dark { color: #0A1E3C; }
        .text-medical-light { color: #F8FAFC; }
        .text-medical-gray { color: #4A5568; } /* Cinza escuro */
        .hover\:bg-medical-hover:hover { background-color: #1A365D; } /* Azul mais claro */
        .border-medical-dark { border-color: #0A1E3C; }
    </style>
</head>
<body class="bg-medical-light text-medical-gray font-sans">

    <!-- Navbar -->
    <nav class="bg-medical-dark text-medical-light py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <a href="#" class="flex items-center space-x-3">
                <img src="{{ asset('images/syseyeidLogo.png') }}" alt="Logo" class="h-10 w-10 rounded-full">
                <span class="font-bold text-xl">SYS EYE ID</span>
            </a>
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('login') }}" class="hover:text-gray-300">Login</a>
                <a href="{{ route('register') }}" class="hover:text-gray-300">Cadastre-se</a>
            </div>
            <button class="md:hidden text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-medical-dark text-medical-light py-20">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold">SysEyeID</h1>
            <p class="text-lg md:text-2xl mt-4">Inteligência artificial aplicada à oftalmologia.</p>
            <a href="{{ route('register') }}" class="mt-8 inline-block bg-white text-medical-dark py-3 px-8 rounded-lg hover:bg-gray-100 transition duration-300">Comece Agora</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-medical-light">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center text-medical-dark">Nossas Soluções</h2>
            <p class="text-center text-medical-gray mt-4">Tecnologia avançada para diagnósticos precisos e eficientes.</p>
            <div class="mt-12 grid gap-8 grid-cols-1 md:grid-cols-3">
                <!-- Feature 1 -->
                <div class="bg-white p-8 rounded-lg shadow-md text-center border border-gray-200">
                    <img src="{{ asset('images/diagnostico.png') }}" alt="Diagnóstico" class="h-20 mx-auto mb-6">
                    <h3 class="font-bold text-xl text-medical-dark">Triagem Descomplicada</h3>
                    <p class="text-medical-gray mt-4">Utilizamos IA para fornecer tragens rápidas e confiáveis.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-white p-8 rounded-lg shadow-md text-center border border-gray-200">
                    <img src="{{ asset('images/interface.png') }}" alt="Interface" class="h-20 mx-auto mb-6">
                    <h3 class="font-bold text-xl text-medical-dark">Interface Intuitiva</h3>
                    <p class="text-medical-gray mt-4">Design pensado para facilitar o uso por médicos e pacientes.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-white p-8 rounded-lg shadow-md text-center border border-gray-200">
                    <img src="{{ asset('images/seguranca.png') }}" alt="Segurança" class="h-20 mx-auto mb-6">
                    <h3 class="font-bold text-xl text-medical-dark">Segurança de Dados</h3>
                    <p class="text-medical-gray mt-4">Protegemos suas informações com os mais altos padrões de segurança.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-medical-dark text-medical-light py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold">Pronto para revolucionar seus diagnósticos?</h2>
            <p class="text-lg mt-4">Junte-se a profissionais que já confiam na SYS EYE ID.</p>
            <a href="{{ route('register') }}" class="mt-8 inline-block bg-white text-medical-dark py-3 px-8 rounded-lg hover:bg-gray-100 transition duration-300">Cadastre-se Agora</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-medical-dark text-medical-light py-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 SYS EYE ID. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>