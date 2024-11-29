<x-app-layout>
    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
        <h1 class="text-2xl font-medium text-gray-900 dark:text-white">Resultado do Exame</h1>
        <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
            Aqui estão os detalhes do exame ocular realizado, incluindo as informações do paciente e os resultados obtidos.
        </p>
    </div>

    <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 p-6 lg:p-8">
        <!-- Informações do Paciente -->
        <h2 class="text-lg font-medium text-gray-900 dark:text-white">Informações do Paciente</h2>
        <div class="mt-4">
            <p class="text-gray-700 dark:text-gray-300">
                <strong>Nome do Paciente:</strong> {{ $nome_paciente }}
            </p>
            <p class="text-gray-700 dark:text-gray-300">
                <strong>Data do Exame:</strong> {{ $data_exame }}
            </p>
        </div>
        
        <!-- Imagem do exame -->
        <div class="mt-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-white">Imagem do Exame</h2>
            <div class="mt-4">
                <img src="{{ Storage::url($caminho_imagem) }}" alt="Imagem do Olho" class="w-full max-w-md mx-auto border rounded-lg">
            </div>
        </div>

        <!-- Resultados -->
        <h2 class="text-lg font-medium text-gray-900 dark:text-white mt-6">Resultado do Exame</h2>
        <div class="mt-4 bg-white dark:bg-gray-900 p-6 rounded-lg border border-gray-300 dark:border-gray-700">
            <p class="text-gray-700 dark:text-gray-300">
                @if ($resultado[0][0] > $resultado[0][1])
                    <strong>Possibilidade de estar saudável:</strong> {{ number_format($resultado[0][0] * 100, 2) }}%<br>
                    <strong>Possibilidade de estar doente:</strong> {{ number_format($resultado[0][1] * 100, 2) }}%
                @else
                    <strong>Possibilidade de estar doente:</strong> {{ number_format($resultado[0][1] * 100, 2) }}%<br>
                    <strong>Possibilidade de estar saudável:</strong> {{ number_format($resultado[0][0] * 100, 2) }}%
                @endif
            </p>
        </div>

        <!-- Botão para Baixar PDF -->
        <div class="mt-6 flex justify-center">
            <a href="{{ route('gerar-pdf') }}" target="_blank"
               class="px-6 py-2 bg-green-700 text-white font-semibold rounded-md hover:bg-green-600 focus:ring-4 focus:ring-green-500 focus:outline-none">
                Baixar Resultado em PDF
            </a>
        </div>
    </div>
</x-app-layout>
