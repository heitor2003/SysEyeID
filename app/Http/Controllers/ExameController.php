<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExameController extends Controller
{
    public function consultarExames(Request $request)
{
    $directory = base_path('storage/app/public/pdfs');
    
    if (is_dir($directory)) {
        $files = scandir($directory);

        // Debug
        dd($files); // Exibe todos os arquivos encontrados
    } else {
        dd('Diretório não encontrado: ' . $directory);
    }// Ajuste no caminho

    if (is_dir($directory)) {
        $pdfFiles = array_filter(scandir($directory), function ($file) use ($directory) {
            return is_file($directory . DIRECTORY_SEPARATOR . $file) && pathinfo($file, PATHINFO_EXTENSION) === 'pdf';
        });
    } else {
        $pdfFiles = [];
    }

    return view('check-exam', compact('pdfFiles'));
}

}

