<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importe a classe Auth

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'email.required' => 'Email é obrigatório', 
            'password.required' => 'Senha é obrigatória',
            'email.email' => 'Email inválido',
            'password.required' => 'Senha é obrigatória', // Corrija o nome da regra aqui
        ]);    

        $credentials = $request->only('email', 'password');
        $authenticated = Auth::attempt($credentials);

        if(!$authenticated){
            return redirect()->route('login.index')->withErrors(['error'=> 'Usuário ou senha inválidos']);
        }
        return redirect()->route('login.index')->with('success', 'Usuário logado com sucesso');
    }

    public function destroy(){
        Auth::logout();
        return redirect()->route('login.index')->with('success', 'Usuário deslogado com sucesso');
    }
}
