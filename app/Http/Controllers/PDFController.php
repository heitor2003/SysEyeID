<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PDFController extends Controller
{
    public function processarExame(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nome_paciente' => 'required|string|max:255',
            'data_exame' => 'required|date',
            'imagem_olho' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'resultado_api' => 'required|string',
        ]);

        // Dados do formulário
        $nomePaciente = $request->input('nome_paciente');
        $dataExame = Carbon::parse($request->input('data_exame'))->format('d-m-Y');
        $resultadoJson = $request->input('resultado_api');

        // Log para depurar o conteúdo do resultado da API
        Log::info('Resultado da API: ', ['resultado' => $resultadoJson]);

        // Decodificar o resultado da API
        $resultado = json_decode($resultadoJson, true);

        // Verificar se a decodificação foi bem-sucedida
        if (is_null($resultado)) {
            // Obter o erro específico de decodificação
            $jsonError = json_last_error_msg();
            // Logar o erro específico
            Log::error('Erro ao decodificar o JSON: ' . $jsonError);

            // Retornar um erro ao usuário
            return response()->json(['error' => 'Erro ao decodificar o resultado da API: ' . $jsonError], 400);
        }

        // Salvar a imagem enviada para o diretório público
        $imagem = $request->file('imagem_olho');
        $imagemCaminho = $imagem->store('uploads', 'public');
        // Obter a URL acessível da imagem
        $urlImagem = asset('storage/' . $imagemCaminho);

        // Exibir a view com os dados
        return view('resultado-exame', [
            'nome_paciente' => $nomePaciente,
            'data_exame' => $dataExame,
            'resultado' => $resultado,
            'url_imagem' => $urlImagem, // Passando a URL da imagem
        ]);
    }

    public function salvarPdf(Request $request)
    {
        // Verifica se o arquivo foi enviado
        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');

            // Obter o nome do paciente e a data do exame da requisição
            $nomePaciente = $request->input('nome_paciente');
            $dataExame = Carbon::parse($request->input('data_exame'))->format('d-m-Y');

            // Gerar o nome do arquivo no formato "Resultado+Nome+Data"
            $nomePdf = 'Resultado_' . str_replace(' ', '_', $nomePaciente) . '_' . $dataExame . '.pdf';

            // Salvar o arquivo na pasta public/pdfs com o nome personalizado
            $path = $pdfFile->storeAs('pdfs', $nomePdf, 'public');

            // Retornar a URL pública do arquivo
            return response()->json([
                'success' => true,
                'pdf_url' => asset('storage/' . $path),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Erro ao receber o arquivo PDF.',
        ]);
    }

    public function visualizarPDF($filename)
    {
        // Localizar o arquivo no storage
        $path = storage_path("storage/app/public/pdfs/{$filename}");

        // Verificar se o arquivo existe
        if (!file_exists($path)) {
            abort(404, "Arquivo não encontrado.");
        }

        // Retornar o PDF para exibição
        return response()->file($path, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}