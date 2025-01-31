<x-app-layout>
    <div class="p-6 lg:p-8 bg-light-yellow dark:bg-water-blue-background border-b border-light-green dark:border-dark-blue">
        <h1 class="text-3xl font-bold text-dark-blue dark:text-light-yellow text-center">Realizar Novo Exame</h1>
        <p class="mt-4 text-lg text-dark-green dark:text-light-green leading-relaxed text-center">
            Siga as etapas abaixo para clasificar um novo exame ocular. Certifique-se de preencher todas as informações corretamente para obter resultados precisos.
        </p>
    </div>

    <div class="water-blue-background bg-opacity-25 py-8 px-6 lg:px-20">
        <form id="exame-form" action="{{ route('processar-exame') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nome-paciente" class="block text-sm font-medium text-dark-blue dark:text-light-yellow">
                        Nome do Paciente
                    </label>
                    <input type="text" id="nome-paciente" name="nome_paciente" required
                        class="mt-2 w-full p-3 bg-light-yellow dark:bg-dark-blue text-dark-blue dark:text-light-yellow border border-light-green dark:border-dark-green rounded-lg focus:ring-light-green focus:border-light-green">
                </div>
                <div>
                    <label for="data-exame" class="block text-sm font-medium text-dark-blue dark:text-light-yellow">
                        Data do Exame
                    </label>
                    <input type="date" id="data-exame" name="data_exame" required
                        class="mt-2 w-full p-3 bg-light-yellow dark:bg-dark-blue text-dark-blue dark:text-light-yellow border border-light-green dark:border-dark-green rounded-lg focus:ring-light-green focus:border-light-green">
                </div>
            </div>

            <div>
                <label for="observacoes" class="block text-sm font-medium text-dark-blue dark:text-light-yellow">
                    Observações
                </label>
                <textarea id="observacoes" name="observacoes" rows="4"
                    class="mt-2 w-full p-3 bg-light-yellow dark:bg-dark-blue text-dark-blue dark:text-light-yellow border border-light-green dark:border-dark-green rounded-lg focus:ring-light-green focus:border-light-green"
                    placeholder="Insira quaisquer observações relevantes (opcional)"></textarea>
            </div>

            <div>
                <label for="imagem-olho" class="block text-sm font-medium text-dark-blue dark:text-light-yellow">
                    Imagem do Olho
                </label>
                <input type="file" id="imagem-olho" name="imagem_olho" accept="image/*" required
                    class="mt-2 w-full p-3 bg-light-yellow dark:bg-dark-blue text-dark-blue dark:text-light-yellow border border-light-green dark:border-dark-green rounded-lg focus:ring-light-green focus:border-light-green">
            </div>

            <input type="hidden" id="resultado-api" name="resultado_api">

            <div class="mt-6 flex justify-center">
                <button type="button" id="invoke-api-button"
                    class="px-6 py-3 light-background text-light-yellow dark:text-dark-blue font-semibold rounded-lg hover:bg-dark-green dark:hover:bg-water-blue-background focus:ring-4 focus:ring-light-green focus:outline-none shadow-lg">
                    Clasificar Exame
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
        document.getElementById('invoke-api-button').addEventListener('click', async function () {
            const fileInput = document.getElementById('imagem-olho');
            const arquivoImagem = fileInput.files[0];

            if (!arquivoImagem) {
                alert('Por favor, envie uma imagem antes de invocar a API.');
                return;
            }

            // Exibe a tela de carregamento
            document.getElementById('loading-screen').classList.remove('hidden');

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

                    // Aguarda 2 segundos antes de enviar para dar um efeito visual mais natural
                    setTimeout(() => {
                        document.getElementById('exame-form').submit();
                    }, 2000);
                } else {
                    alert('Erro: Resposta inválida da API');
                    document.getElementById('loading-screen').classList.add('hidden');
                }
            } catch (error) {
                alert(`Erro: ${error.message}`);
                document.getElementById('loading-screen').classList.add('hidden');
            }
        });
    </script>
</x-app-layout>
