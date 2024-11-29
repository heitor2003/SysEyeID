<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function gerarPDF()
    {
        // Dados da sessão
        $dados = [
            'nome_paciente' => session('nome_paciente'),
            'data_exame' => session('data_exame'),
            'resultado' => json_decode(session('resultado_api'), true),
        ];

        if (!$dados['resultado']) {
            return redirect('/new-exam')->withErrors(['error' => 'Nenhum resultado encontrado para gerar PDF.']);
        }

        // Renderizar o PDF
        $pdf = Pdf::loadView('resultado-exame', $dados);

        return $pdf->download('resultado-exame.pdf');
    }
}
