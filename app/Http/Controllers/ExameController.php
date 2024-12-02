<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExameController extends Controller
{
    public function consultarExames(Request $request)
{
    // Pega os arquivos da pasta 'public/pdfs' em storage
    $pdfFiles = Storage::files('public/pdfs');

    // Certifica-se que $pdfFiles não é null
    if (empty($pdfFiles)) {
        $pdfFiles = [];  // Garante que sempre seja um array
    }

    // Passa os arquivos para a view
    return view('check-exam', compact('pdfFiles'));
}

}
