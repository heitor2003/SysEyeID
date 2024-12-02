<x-app-layout>
    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
        <h1 class="text-2xl font-medium text-gray-900 dark:text-white text-center">Consulta de Exames</h1>
        <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed text-center">
            Aqui você pode consultar os exames realizados pelos pacientes e baixar os resultados em PDF.
        </p>
    </div>

    <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 p-6 lg:p-8">
        <!-- Filtro de Nome e Data -->
        <div class="flex justify-between items-center mb-6">
            <form action="{{ route('check-exam') }}" method="GET" class="w-full">
                <div class="flex space-x-4">
                    <input type="text" name="nome_paciente" placeholder="Nome do Paciente" class="w-full p-2 rounded-md border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200" />
                    <input type="date" name="data_exame" placeholder="Data do Exame" class="w-full p-2 rounded-md border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200" />
                    <button type="submit" class="px-6 py-2 bg-blue-700 text-white font-semibold rounded-md hover:bg-blue-600">
                        Filtrar
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabela de Exames -->
        <div class="overflow-x-auto bg-white dark:bg-gray-900 p-6 rounded-lg border border-gray-300 dark:border-gray-700">
            <table class="min-w-full table-auto text-left">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-gray-700 dark:text-gray-300">Nome do Paciente</th>
                        <th class="px-6 py-3 text-gray-700 dark:text-gray-300">Data do Exame</th>
                        <th class="px-6 py-3 text-gray-700 dark:text-gray-300">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($pdfFiles) > 0)
                        @foreach ($pdfFiles as $file)
                            <tr class="border-b border-gray-300 dark:border-gray-700">
                                <td class="px-6 py-3 text-gray-700 dark:text-gray-300">{{ basename($file) }}</td>
                                <td class="px-6 py-3 text-gray-700 dark:text-gray-300">{{ \Carbon\Carbon::parse(basename($file))->format('d/m/Y') }}</td>
                                <td class="px-6 py-3 text-center">
                                    <a href="{{ asset('storage/pdfs/' . basename($file)) }}" class="px-4 py-2 bg-green-700 text-white rounded-md hover:bg-green-600" download>
                                        Baixar PDF
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="px-6 py-3 text-center text-gray-700 dark:text-gray-300">
                                Nenhum exame encontrado.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
