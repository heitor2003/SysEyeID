<div class="p-6 lg:p-8 water-blue-background border-b border-gray-200 dark:border-gray-700">
    
    <h1 class="mt-8 text-2xl font-medium light-text">
        Bem-vindo ao SYSEYE ID!
    </h1>

    <p class="mt-6 light-text leading-relaxed">
        O SYSEYE ID é sua solução completa para gerenciar exames oculares. Consulte exames já realizados ou inicie um novo para obter resultados precisos e rápidos.
    </p>
</div>

<div class="water-blue-background bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <!-- Consultar Exame -->
    <div>
        <div class="flex items-center">
            <h2 class="ms-3 text-xl font-semibold light-text">
                Consultar Exame
            </h2>
        </div>

        <p class="mt-4 light-text text-sm leading-relaxed">
            Acesse rapidamente os resultados de exames anteriores. Filtre por data, paciente ou status do exame.
        </p>

        <p class="mt-4 text-sm">
            <a href="/check-exam" class="inline-flex items-center font-semibold light-text">
                Consultar Exame

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>

    <!-- Realizar Novo Exame -->
    <div class="water-blue-background">
        <div class="flex items-center">
            <h2 class="ms-3 text-xl font-semibold light-text">
                Realizar Novo Exame
            </h2>
        </div>

        <p class="mt-4 light-text text-sm leading-relaxed">
            Inicie um novo exame ocular para seu paciente. O sistema guiará você por todas as etapas, garantindo precisão nos resultados.
        </p>

        <p class="mt-4 text-sm">
            <a href="{{ route('new-exam') }}" class="inline-flex items-center font-semibold light-text">
                Iniciar Novo Exame

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>
</div>

<style>
    .light-background { background-color: #c7d1d4; }
    .water-blue-background { background-color: #79b6c8; }
    .light-text { color: #061722; }
</style>
