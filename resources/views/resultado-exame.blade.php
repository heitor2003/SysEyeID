<head><meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<x-app-layout>
    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
        <h1 class="text-2xl font-medium text-gray-900 dark:text-white text-center">Resultado do Exame</h1>
        <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed text-center">
            Aqui estão os detalhes do exame ocular realizado, incluindo as informações do paciente e os resultados obtidos.
        </p>
    </div>

    <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 p-6 lg:p-8">
        <!-- Informações do Paciente -->
        <h2 class="text-lg font-medium text-gray-900 dark:text-white text-center">Informações do Paciente</h2>
        <div class="mt-4 text-center">
            <p class="text-gray-700 dark:text-gray-300">
                <strong>Nome do Paciente:</strong> {{ $nome_paciente }}
            </p>
            <p class="text-gray-700 dark:text-gray-300">
                <strong>Data do Exame:</strong> {{ $data_exame }}
            </p>
        </div>
        
        <!-- Imagem do exame -->
        <div class="mt-6 text-center">
            <h2 class="text-lg font-medium text-gray-900 dark:text-white">Imagem do Exame</h2>
            <div class="mt-4">
                <img src="{{ $url_imagem }}" alt="Imagem do Olho" class="w-1/2 max-w-md mx-auto border rounded-lg">
            </div>
        </div>

        <!-- Resultados -->
        <h2 class="text-lg font-medium text-gray-900 dark:text-white mt-6 text-center">Resultado do Exame</h2>
        <div class="mt-4 bg-white dark:bg-gray-900 p-6 rounded-lg border border-gray-300 dark:border-gray-700 text-center">
            <p class="text-gray-700 dark:text-gray-300">
                @if ($resultado[0][0] > $resultado[0][1])
                    <strong>Possibilidade de estar saudável:</strong> {{ number_format($resultado[0][0] * 100, 2) }}%<br>
                    <strong>Possibilidade de estar doente:</strong> {{ number_format($resultado[0][1] * 100, 2) }}%
                @else
                    <strong>Possibilidade de estar doente:</strong> {{ number_format($resultado[0][1] * 100, 2) }}%<br>
                    <strong>Possibilidade de estar saudável:</strong> {{ number_format($resultado[0][0] * 100, 2) }}%
                @endif
            </p>
        </div>

        <!-- Botão para Gerar PDF -->
        <div class="mt-6 flex justify-center">
            <button id="gerar-pdf" class="px-6 py-2 bg-green-700 text-white font-semibold rounded-md hover:bg-green-600 focus:ring-4 focus:ring-green-500 focus:outline-none">
                Baixar Resultado em PDF
            </button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    
    <script>
document.getElementById("gerar-pdf").addEventListener("click", function () {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Dados para o PDF
    const nomePaciente = "{{ $nome_paciente }}";
    const dataExame = "{{ $data_exame }}";
    const resultado = @json($resultado);
    const urlImagem = "{{ $url_imagem }}";

    // Adicionando informações ao PDF
    doc.text("Resultado do Exame", 10, 10);
    doc.text(`Nome do Paciente: ${nomePaciente}`, 10, 20);
    doc.text(`Data do Exame: ${dataExame}`, 10, 30);

    // Adicionando a imagem ao PDF
    doc.addImage(urlImagem, 'JPEG', 10, 40, 100, 90);

    // Resultados do exame
    let resultadoText = '';
    if (resultado[0][0] > resultado[0][1]) {
        resultadoText = `Possibilidade de estar saudável: ${(resultado[0][0] * 100).toFixed(2)}%\n`;
        resultadoText += `Possibilidade de estar doente: ${(resultado[0][1] * 100).toFixed(2)}%`;
    } else {
        resultadoText = `Possibilidade de estar doente: ${(resultado[0][1] * 100).toFixed(2)}%\n`;
        resultadoText += `Possibilidade de estar saudável: ${(resultado[0][0] * 100).toFixed(2)}%`;
    }
    doc.text(resultadoText, 10, 220);

    // Convertendo o PDF para Blob
    const pdfBlob = doc.output('blob');

    // Criar um objeto FormData para envio ao servidor
    const formData = new FormData();
    formData.append("pdf", pdfBlob, "resultado_exame.pdf");

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Enviar o PDF ao servidor
    fetch("/salvar-pdf", {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        },
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Construir a URL para visualizar o PDF em uma nova aba
                const pdfUrl = `/visualizar-pdf/${data.pdf_url.split('/').pop()}`;
                window.open(pdfUrl, '_blank');
            } else {
                alert("Erro ao salvar o PDF.");
            }
        })
        .catch(error => {
            console.error("Erro ao enviar o PDF:", error);
            alert("Erro ao enviar o PDF para o servidor.");
        });
});
</script>

</x-app-layout>
