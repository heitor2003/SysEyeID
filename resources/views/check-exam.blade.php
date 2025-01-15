<x-app-layout>
    <div class="p-6 lg:p-8 light-background light-text">
        <h1 class="text-2xl font-medium text-center light-text">Consulta de Exames</h1>
        <p class="mt-6 text-center light-text">
            Aqui você pode consultar os exames realizados pelos pacientes e baixar os resultados em PDF.
        </p>
    </div>

    <div class="water-blue-background p-6 lg:p-8">
        <div id="app">
            <!-- Tabela de Exames -->
            <div v-if="loading" class="text-center light-text">Carregando...</div>
            <div v-else-if="pdfs.length === 0" class="text-center light-text">Nenhum PDF encontrado.</div>
            <table v-else class="min-w-full table-auto text-left light-background p-6 rounded-lg border">
                <thead>
                    <tr>
                        <th class="px-6 py-3 light-text">Nome do Arquivo</th>
                        <th class="px-6 py-3 light-text">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="file in pdfs" :key="file" class="border-b">
                        <td class="px-6 py-3 light-text">@{{ file }}</td>
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

    <style>
        .light-background { background-color: #c7d1d4; }
        .water-blue-background { background-color: #79b6c8; }
        .light-text { color: #061722; }
    </style>
</x-app-layout>
