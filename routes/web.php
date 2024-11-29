<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('login', [LoginController::class, 'login']);

Route::get('/new-exam', function () {
    return view('new-exam');
})->name('new-exam');

Route::post('/processar-exame', function (Request $request) {
    // Recebe os dados enviados pelo formulário
    $dados = $request->all();

    // Verifica se o resultado da API foi enviado
    if (empty($dados['resultado_api'])) {
        return response()->json(['error' => 'Nenhum resultado recebido da API'], 400);
    }

    // Armazena o resultado da API na sessão
    session(['resultado_api' => $dados['resultado_api']]);

    // Redireciona para a página de exibição do resultado
    return redirect('/resultado-exame');
})->name('processar-exame');

Route::get('/resultado-exame', function () {
    // Obtém o resultado da sessão
    $resultadoApi = session('resultado_api');

    if (!$resultadoApi) {
        return redirect('/new-exam')->withErrors(['error' => 'Nenhum resultado encontrado para exibir.']);
    }

    // Decodifica o JSON armazenado na sessão e envia para a view
    return view('resultado-exame', ['resultado' => json_decode($resultadoApi, true)]);
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
