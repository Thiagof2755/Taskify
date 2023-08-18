<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class CreateUserController extends Controller
{
    public function index()
    {
        return view('NewUser');
    }

    public function create(Request $request)
    {
        // Validate the form data if necessary
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);
    
    
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
    
        return redirect()->route('login.index')->with('success', 'Usuário Criado com sucesso');
    }
}
