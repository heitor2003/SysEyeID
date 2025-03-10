<div class="p-6 lg:p-8 bg-gradient-to-r from-blue-900 to-blue-700 border-b border-gray-200">
    <h1 class="mt-8 text-3xl font-bold text-white">
        Bem-vindo ao SYSEYE ID!
    </h1>

    <p class="mt-6 text-lg text-gray-100 leading-relaxed">
        O SYSEYE ID é sua solução completa para gerenciar exames oculares. Consulte exames já realizados ou inicie um novo para obter resultados precisos e rápidos.
    </p>
</div>

<div class="bg-gray-50 grid grid-cols-1 md:grid-cols-2 gap-8 p-6 lg:p-8">
    <!-- Consultar Exame -->
    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-700" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
            </svg>
            <h2 class="ml-3 text-2xl font-semibold text-blue-900">
                Consultar Exame
            </h2>
        </div>

        <p class="mt-4 text-gray-700 text-sm leading-relaxed">
            Acesse rapidamente os resultados de exames anteriores. Filtre por data, paciente ou status do exame.
        </p>

        <p class="mt-4 text-sm">
            <a href="/check-exam" class="inline-flex items-center font-semibold text-blue-700 hover:text-blue-800 transition-colors duration-200">
                Consultar Exame
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ml-2 w-5 h-5 fill-current">
                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>

    <!-- Realizar Novo Exame -->
    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-700" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
            </svg>
            <h2 class="ml-3 text-2xl font-semibold text-blue-900">
                Realizar Novo Exame
            </h2>
        </div>

        <p class="mt-4 text-gray-700 text-sm leading-relaxed">
            Inicie um novo exame ocular para seu paciente. O sistema guiará você por todas as etapas, garantindo precisão nos resultados.
        </p>

        <p class="mt-4 text-sm">
            <a href="{{ route('new-exam') }}" class="inline-flex items-center font-semibold text-blue-700 hover:text-blue-800 transition-colors duration-200">
                Iniciar Novo Exame
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ml-2 w-5 h-5 fill-current">
                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>
</div>