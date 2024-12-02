<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function listPdfs()
    {
        // Diretório onde estão os PDFs
        $directory = public_path('storage/pdfs');

        // Verifica se o diretório existe
        if (!is_dir($directory)) {
            return response()->json(['error' => 'Directory not found.'], 404);
        }

        // Busca arquivos PDF
        $files = array_filter(scandir($directory), function ($file) use ($directory) {
            return is_file($directory . DIRECTORY_SEPARATOR . $file) && pathinfo($file, PATHINFO_EXTENSION) === 'pdf';
        });

        // Retorna uma lista dos arquivos
        return response()->json(array_values($files)); // array_values para reindexar
    }
}
