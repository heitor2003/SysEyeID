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
    // Verifica se o resultado da API foi enviado
    $resultadoApi = $request->input('resultado_api');

    // Se não houver resultado, retorna erro
    if (!$resultadoApi) {
        return response()->json(['error' => 'Nenhum resultado recebido da API'], 400);
    }

    // Armazena o resultado na sessão
    session(['resultado_api' => $resultadoApi]);

    // Log para depuração (opcional)
    \Log::info('Resultado recebido da API:', ['resultado_api' => $resultadoApi]);

    // Retorna a resposta para o frontend
    return response()->json(['success' => true, 'message' => 'Resultado armazenado com sucesso']);
});

Route::get('/resultado-exame', function () {
    // Obtém o resultado da sessão
    $resultadoApi = session('resultado_api');

    // Verifica se o resultado existe
    if (!$resultadoApi) {
        return redirect('/new-exam')->with('error', 'Nenhum resultado de exame encontrado.');
    }

    return view('resultado-exame', ['resultado' => json_decode($resultadoApi)]);
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
