<x-app-layout>
    <div class="p-6 lg:p-8 bg-gray-50 text-gray-800">
        <h1 class="text-2xl font-semibold text-center">Consulta de Exames</h1>
        <p class="mt-4 text-center">
            Aqui você pode consultar os exames realizados pelos pacientes e baixar os resultados em PDF.
        </p>
    </div>

    <div class="bg-white p-6 lg:p-8 shadow-md rounded-lg">
        <div id="app">
            <!-- Mensagens de status -->
            <div v-if="loading" class="text-center text-gray-600">Carregando...</div>
            <div v-else-if="pdfs.length === 0" class="text-center text-gray-600">Nenhum PDF encontrado.</div>

            <!-- Tabela de Exames -->
            <table v-else class="min-w-full table-auto border-collapse border border-gray-300 shadow-sm rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium">Nome do Arquivo</th>
                        <th class="px-6 py-3 text-center text-gray-700 font-medium">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="file in pdfs" :key="file" class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-gray-800">@{{ file }}</td>
                        <td class="px-6 py-4 text-center">
                            <a :href="`/storage/pdfs/${file}`" class="px-3 py-1.5 bg-green-600 text-white rounded-md flex items-center justify-center gap-1 hover:bg-green-700 transition text-sm" download>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v12m0 0l-3-3m3 3l3-3m-6 6h6" />
                                </svg>
                                Baixar
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
                    .get('/pdfs')
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
    </script
</x-app-layout>
