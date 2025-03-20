<x-app-layout>
    <!-- Cabeçalho -->
    <div class="p-6 lg:p-8 bg-light-yellow border-b border-light-green dark:bg-dark-blue dark:border-dark-blue">
        <h1 class="text-3xl font-bold text-dark-blue dark:text-light-yellow text-center">Realizar Novo Exame</h1>
        <p class="mt-4 text-lg text-dark-green dark:text-light-green leading-relaxed text-center">
            Siga as etapas abaixo para classificar um novo exame ocular. Certifique-se de preencher todas as informações corretamente para obter resultados precisos.
        </p>
    </div>

    <!-- Formulário Centralizado -->
    <div class="bg-water-blue bg-opacity-25 py-8 px-6 lg:px-20 flex justify-center">
        <form id="exame-form" action="{{ route('processar-exame') }}" method="POST" enctype="multipart/form-data" class="space-y-8 w-full max-w-2xl">
            @csrf
            <!-- Campos do Formulário -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nome do Paciente -->
                <div>
                    <label for="nome-paciente" class="block text-sm font-medium text-dark-blue dark:text-light-yellow">
                        Nome do Paciente <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nome-paciente" name="nome_paciente" required
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-light-green focus:ring focus:ring-light-green focus:ring-opacity-50 dark:bg-dark-blue dark:border-dark-blue dark:text-light-yellow p-2 text-sm">
                </div>
                <!-- Data do Exame (Data Atual por Padrão) -->
                <div>
                    <label for="data-exame" class="block text-sm font-medium text-dark-blue dark:text-light-yellow">
                        Data do Exame <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="data-exame" name="data_exame" required
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-light-green focus:ring focus:ring-light-green focus:ring-opacity-50 dark:bg-dark-blue dark:border-dark-blue dark:text-light-yellow p-2 text-sm">
                </div>
            </div>

            <!-- Observações -->
            <div>
                <label for="observacoes" class="block text-sm font-medium text-dark-blue dark:text-light-yellow">
                    Observações
                </label>
                <textarea id="observacoes" name="observacoes" rows="4"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-light-green focus:ring focus:ring-light-green focus:ring-opacity-50 dark:bg-dark-blue dark:border-dark-blue dark:text-light-yellow p-2 text-sm"
                    placeholder="Insira quaisquer observações relevantes (opcional)"></textarea>
            </div>

            <!-- Upload da Imagem -->
            <div>
                <label for="imagem-olho" class="block text-sm font-medium text-dark-blue dark:text-light-yellow">
                    Imagem do Olho <span class="text-red-500">*</span>
                </label>
                <input type="file" id="imagem-olho" name="imagem_olho" accept="image/*" required
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-light-green focus:ring focus:ring-light-green focus:ring-opacity-50 dark:bg-dark-blue dark:border-dark-blue dark:text-light-yellow p-2 text-sm">
            </div>

            <!-- Campo Oculto para Resultado da API -->
            <input type="hidden" id="resultado-api" name="resultado_api">

            <!-- Botão de Submissão -->
            <div class="mt-6 flex justify-center">
                <button type="button" id="invoke-api-button"
                    class="btn-primary bg-blue-700 text-white px-6 py-2 rounded-md hover:bg-dark-green transition duration-300 text-sm">
                    Classificar Exame
                </button>
            </div>
        </form>
    </div>

    <!-- Tela de Carregamento -->
    <div id="loading-screen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white dark:bg-dark-blue p-6 rounded-lg shadow-lg flex flex-col items-center">
            <svg class="animate-spin h-10 w-10 text-light-green dark:text-light-yellow" viewBox="0 0 24 24" fill="none">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
            </svg>
            <p class="mt-4 text-dark-blue dark:text-light-yellow text-lg font-semibold">Processando exame...</p>
        </div>
    </div>

    <script>
        // Função para exibir a tela de carregamento
        function showLoadingScreen() {
            document.getElementById('loading-screen').classList.remove('hidden');
        }

        // Função para ocultar a tela de carregamento
        function hideLoadingScreen() {
            document.getElementById('loading-screen').classList.add('hidden');
        }

        // Função para validar o formulário
        function validateForm() {
            const nomePaciente = document.getElementById('nome-paciente').value.trim();
            const dataExame = document.getElementById('data-exame').value;
            const imagemOlho = document.getElementById('imagem-olho').files[0];

            if (!nomePaciente || !dataExame || !imagemOlho) {
                alert('Por favor, preencha todos os campos obrigatórios.');
                return false;
            }
            return true;
        }

        // Definir a data atual como valor padrão para o campo de data
        function setDefaultDate() {
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            const formattedDate = `${year}-${month}-${day}`;
            document.getElementById('data-exame').value = formattedDate;
        }

        // Evento de clique no botão "Classificar Exame"
        document.getElementById('invoke-api-button').addEventListener('click', async function () {
            if (!validateForm()) return;

            const fileInput = document.getElementById('imagem-olho');
            const arquivoImagem = fileInput.files[0];

            showLoadingScreen();

            try {
                const formData = new FormData();
                formData.append('file', arquivoImagem);

                const response = await fetch('http://localhost:5000/predict', {
                    method: 'POST',
                    body: formData,
                });

                if (!response.ok) {
                    throw new Error(`Erro HTTP: ${response.status}`);
                }

                const data = await response.json();

                if (data && data.predicao) {
                    document.getElementById('resultado-api').value = JSON.stringify(data.predicao);

                    setTimeout(() => {
                        document.getElementById('exame-form').submit();
                    }, 2000);
                } else {
                    alert('Erro: Resposta inválida da API');
                    hideLoadingScreen();
                }
            } catch (error) {
                alert(`Erro: ${error.message}`);
                hideLoadingScreen();
            }
        });

        // Definir a data padrão ao carregar a página
        setDefaultDate();
    </script>
</x-app-layout>