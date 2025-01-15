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
                <!-- Informações do Paciente -->
                <div>
                    <label for="nome-paciente" class="block text-sm font-medium text-dark-blue dark:text-light-yellow">
                        Nome do Paciente
                    </label>
                    <input type="text" id="nome-paciente" name="nome_paciente" required
                        class="mt-2 w-full p-3 bg-light-yellow dark:bg-dark-blue text-dark-blue dark:text-light-yellow border border-light-green dark:border-dark-green rounded-lg focus:ring-light-green focus:border-light-green">
                </div>

                <!-- Data do Exame -->
                <div>
                    <label for="data-exame" class="block text-sm font-medium text-dark-blue dark:text-light-yellow">
                        Data do Exame
                    </label>
                    <input type="date" id="data-exame" name="data_exame" required
                        class="mt-2 w-full p-3 bg-light-yellow dark:bg-dark-blue text-dark-blue dark:text-light-yellow border border-light-green dark:border-dark-green rounded-lg focus:ring-light-green focus:border-light-green">
                </div>
            </div>

            <!-- Observações -->
            <div>
                <label for="observacoes" class="block text-sm font-medium text-dark-blue dark:text-light-yellow">
                    Observações
                </label>
                <textarea id="observacoes" name="observacoes" rows="4"
                    class="mt-2 w-full p-3 bg-light-yellow dark:bg-dark-blue text-dark-blue dark:text-light-yellow border border-light-green dark:border-dark-green rounded-lg focus:ring-light-green focus:border-light-green"
                    placeholder="Insira quaisquer observações relevantes (opcional)"></textarea>
            </div>

            <!-- Campo para Enviar a Imagem do Olho -->
            <div>
                <label for="imagem-olho" class="block text-sm font-medium text-dark-blue dark:text-light-yellow">
                    Imagem do Olho
                </label>
                <input type="file" id="imagem-olho" name="imagem_olho" accept="image/*" required
                    class="mt-2 w-full p-3 bg-light-yellow dark:bg-dark-blue text-dark-blue dark:text-light-yellow border border-light-green dark:border-dark-green rounded-lg focus:ring-light-green focus:border-light-green">
            </div>

            <input type="hidden" id="resultado-api" name="resultado_api">

            <!-- Botão para Invocar API -->
            <div class="mt-6 flex justify-center">
                <button type="button" id="invoke-api-button"
                    class="px-6 py-3 light-background text-light-yellow dark:text-dark-blue font-semibold rounded-lg hover:bg-dark-green dark:hover:bg-water-blue-background focus:ring-4 focus:ring-light-green focus:outline-none shadow-lg">
                    Clasificar Exame
                </button>
            </div>

            <!-- Div para exibir a resposta da API -->
            <div id="api-response" class="mt-4 text-lg text-dark-blue dark:text-light-yellow text-center font-semibold"></div>
        </form>
    </div>

    <script>
        document.getElementById('invoke-api-button').addEventListener('click', async function () {
            const fileInput = document.getElementById('imagem-olho');
            const arquivoImagem = fileInput.files[0]; // Obtém o arquivo de imagem enviado pelo usuário

            if (!arquivoImagem) {
                document.getElementById('api-response').innerText = 'Por favor, envie uma imagem.';
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
