<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validação baseada no tipo de usuário
        $request->validate([
            'user_type' => ['required', Rule::in(['medico', 'clinica'])],
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'crm' => 'required_if:user_type,medico|nullable|string|max:20',
            'cnpj' => 'required_if:user_type,clinica|nullable|string|max:20',
            'address' => 'required_if:user_type,clinica|nullable|string|max:255',
        ]);

        // Criação do usuário
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
            'crm' => $request->user_type === 'medico' ? $request->crm : null,
            'cnpj' => $request->user_type === 'clinica' ? $request->cnpj : null,
            'address' => $request->user_type === 'clinica' ? $request->address : null,
        ]);

        auth()->login($user);

        return redirect()->route('dashboard');
    }
}
