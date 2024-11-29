<x-app-layout>
    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
        <h1 class="text-2xl font-medium text-gray-900 dark:text-white">Realizar Novo Exame</h1>
        <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
            Siga as etapas abaixo para realizar um novo exame ocular. Certifique-se de preencher todas as informações corretamente para obter resultados precisos.
        </p>
    </div>

    <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 p-6 lg:p-8">
        <form id="exame-form" action="{{ route('processar-exame') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <!-- Informações do Paciente -->
            <div>
                <label for="nome-paciente" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Nome do Paciente
                </label>
                <input type="text" id="nome-paciente" name="nome_paciente" required
                    class="mt-2 w-full p-3 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Data do Exame -->
            <div>
                <label for="data-exame" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Data do Exame
                </label>
                <input type="date" id="data-exame" name="data_exame" required
                    class="mt-2 w-full p-3 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Observações -->
            <div>
                <label for="observacoes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Observações
                </label>
                <textarea id="observacoes" name="observacoes" rows="4"
                    class="mt-2 w-full p-3 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Insira quaisquer observações relevantes (opcional)"></textarea>
            </div>

            <!-- Campo para Enviar a Imagem do Olho -->
            <div>
                <label for="imagem-olho" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Imagem do Olho
                </label>
                <input type="file" id="imagem-olho" name="imagem_olho" accept="image/*" required
                    class="mt-2 w-full p-3 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <input type="hidden" id="resultado-api" name="resultado_api">

            <!-- Botão para Invocar API -->
            <div class="mt-6 flex justify-center">
                <button type="button" id="invoke-api-button"
                    class="px-6 py-2 bg-indigo-700 text-white font-semibold rounded-md hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-500 focus:outline-none">
                    Realizar Exame
                </button>
            </div>

            <!-- Div para exibir a resposta da API -->
            <div id="api-response" class="mt-4 text-gray-800 dark:text-gray-200 text-center"></div>
        </form>
    </div>

    <script>
        document.getElementById('invoke-api-button').addEventListener('click', async function () {
            const fileInput = document.getElementById('imagem-olho');
            const arquivoImagem = fileInput.files[0]; // Obtém o arquivo de imagem enviado pelo usuário

            if (!arquivoImagem) {
                document.getElementById('api-response').innerText = 'Por favor, envie uma imagem antes de invocar a API.';
                return;
            }

            try {
                const formData = new FormData();
                formData.append('file', arquivoImagem);

                // Fazendo a requisição à API Flask
                const response = await fetch('http://localhost:5000/predict', {
                    method: 'POST',
                    body: formData,
                });

                if (!response.ok) {
                    throw new Error(`Erro HTTP: ${response.status}`);
                }

                const data = await response.json();

                if (data && data.predicao) {
                    // Adiciona o resultado ao campo oculto do formulário
                    document.getElementById('resultado-api').value = JSON.stringify(data.predicao);

                    // Submete o formulário para o Laravel
                    document.getElementById('exame-form').submit();
                } else {
                    document.getElementById('api-response').innerText = 'Erro: Resposta inválida da API';
                }
            } catch (error) {
                document.getElementById('api-response').innerText = `Erro: ${error.message}`;
            }
        });
    </script>
</x-app-layout>
