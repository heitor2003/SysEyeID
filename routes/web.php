<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use App\Http\Controllers\PDFController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('login', [LoginController::class, 'login']);

Route::get('/new-exam', function () {
    return view('new-exam');
})->name('new-exam');

Route::get('/visualizar-pdf/{filename}', [PDFController::class, 'visualizarPDF'])->name('visualizar-pdf');

Route::get('/check-exam', function () {
    return view('check-exam');
})->name('check-exam');

Route::post('/processar-exame', function (Request $request) {
    $request->validate([
        'nome_paciente' => 'required|string',
        'data_exame' => 'required|date',
        'imagem_olho' => 'required|image',
        'resultado_api' => 'required',
    ]);

    try {
        $caminhoArquivo = $request->file('imagem_olho')->store('public/uploads');

        session([
            'resultado_api' => $request->resultado_api,
            'nome_paciente' => $request->nome_paciente,
            'data_exame' => $request->data_exame,
            'caminho_imagem' => $caminhoArquivo,
        ]);

        return redirect()->route('carregando');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Erro ao salvar a imagem: ' . $e->getMessage()]);
    }
})->name('processar-exame');

Route::post('/processar-exame', [PDFController::class, 'processarExame'])->name('processar-exame');

Route::get('/gerar-pdf', [PDFController::class, 'gerarPdf'])->name('gerar-pdf');

Route::post('/salvar-pdf', [PDFController::class, 'salvarPdf']);

Route::get('/resultado-exame', function () {
    // Obtém os dados da sessão
    $resultadoApi = session('resultado_api');
    $nome_paciente = session('nome_paciente');
    $data_exame = session('data_exame');
    $caminhoImagem = session('caminho_imagem'); // Caminho do arquivo na sessão

    if (!$resultadoApi) {
        return redirect('/new-exam')->withErrors(['error' => 'Nenhum resultado encontrado para exibir.']);
    }

    return view('resultado-exame', [
        'resultado' => json_decode($resultadoApi, true),
        'nome_paciente' => $nome_paciente,
        'data_exame' => $data_exame,
        'caminho_imagem' => $caminhoImagem, // Passa o caminho para a view
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
