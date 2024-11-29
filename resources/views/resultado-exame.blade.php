<x-app-layout>
    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
        <h1 class="text-2xl font-medium text-gray-900 dark:text-white">Resultado do Exame</h1>
        <p class="mt-6 text-gray-500 dark:text-gray-400">
            Abaixo estão as informações do paciente e o resultado do exame realizado.
        </p>
    </div>

    <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 p-6 lg:p-8">
        <h2 class="text-lg font-medium text-gray-900 dark:text-white">Informações do Paciente</h2>
        <p class="mt-4 text-gray-800 dark:text-gray-300">
            <strong>Nome do Paciente:</strong> {{ session('nome_paciente') }}<br>
            <strong>Data do Exame:</strong> {{ session('data_exame') }}
        </p>

        <h2 class="text-lg font-medium text-gray-900 dark:text-white mt-6">Resultado</h2>
        <pre class="mt-4 p-4 bg-white dark:bg-gray-900 rounded-md text-gray-800 dark:text-gray-300">
@if ($resultado[0][0] > $resultado[0][1])
Possibilidade de estar saudável: {{ number_format($resultado[0][0] * 100, 2) }}%
Possibilidade de estar doente: {{ number_format($resultado[0][1] * 100, 2) }}%
@else
Possibilidade de estar doente: {{ number_format($resultado[0][1] * 100, 2) }}%
Possibilidade de estar saudável: {{ number_format($resultado[0][0] * 100, 2) }}%
@endif
        </pre>
    </div>
</x-app-layout>
