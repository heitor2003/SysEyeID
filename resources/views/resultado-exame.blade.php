<x-app-layout>
    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
        <h1 class="text-2xl font-medium text-gray-900 dark:text-white">Resultado do Exame</h1>
        <p class="mt-6 text-gray-500 dark:text-gray-400">
            Abaixo está o resultado retornado pela API para o exame realizado.
        </p>
    </div>

    <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 p-6 lg:p-8">
        <h2 class="text-lg font-medium text-gray-900 dark:text-white">Resultado</h2>
        <pre class="mt-4 p-4 bg-white dark:bg-gray-900 rounded-md text-gray-800 dark:text-gray-300">
{{ json_encode($resultado, JSON_PRETTY_PRINT) }}
        </pre>
    </div>
</x-app-layout>
