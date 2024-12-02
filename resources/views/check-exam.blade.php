<x-app-layout>
    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800">
        <h1 class="text-2xl font-medium text-gray-900 dark:text-white text-center">Consulta de Exames</h1>
        <p class="mt-6 text-gray-500 dark:text-gray-400 text-center">
            Aqui você pode consultar os exames realizados pelos pacientes e baixar os resultados em PDF.
        </p>
    </div>

    <div class="bg-gray-200 dark:bg-gray-800 p-6 lg:p-8">
        <div id="app">
            <!-- Tabela de Exames -->
            <div v-if="loading" class="text-center">Carregando...</div>
            <div v-else-if="pdfs.length === 0" class="text-center">Nenhum PDF encontrado.</div>
            <table v-else class="min-w-full table-auto text-left bg-white dark:bg-gray-900 p-6 rounded-lg border">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-gray-700 dark:text-gray-300">Nome do Arquivo</th>
                        <th class="px-6 py-3 text-gray-700 dark:text-gray-300">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="file in pdfs" :key="file" class="border-b">
                        <td class="px-6 py-3 text-gray-700 dark:text-gray-300">@{{ file }}</td>
                        <td class="px-6 py-3 text-center">
                            <a :href="`/storage/pdfs/${file}`" class="px-4 py-2 bg-green-700 text-white rounded-md" download>
                                Baixar PDF
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@3"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const { createApp } = Vue;

        createApp({
            data() {
                return {
                    pdfs: [],
                    loading: true,
                };
            },
            mounted() {
                axios
                    .get('/api/pdfs')
                    .then((response) => {
                        this.pdfs = response.data;
                    })
                    .catch((error) => {
                        console.error('Erro ao carregar os PDFs:', error);
                    })
                    .finally(() => {
                        this.loading = false;
                    });
            },
        }).mount('#app');
    </script>
</x-app-layout>
