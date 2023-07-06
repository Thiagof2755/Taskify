<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/testar-conexao', function () {
    try {
        DB::connection()->getPdo();
        return 'Conexão bem-sucedida!';
    } catch (\Exception $e) {
        return 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
    }
});
Route::get('/testar-tabelas', function () {
    try {
        $tables = DB::select('SHOW TABLES');
        $tableNames = [];

        foreach ($tables as $table) {
            $tableName = reset($table);
            $tableNames[] = $tableName;
        }

        return $tableNames;
    } catch (\Exception $e) {
        return 'Erro ao obter as tabelas do banco de dados: ' . $e->getMessage();
    }
});

Route::get('/inserir-usuario', function () {
    try {
        $user = new User();
        $user->name = 'John Doe';
        $user->email = 'john@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        
        return 'Usuário inserido com sucesso!';
    } catch (\Exception $e) {
        return 'Erro ao inserir usuário: ' . $e->getMessage();
    }
});
Route::get('/remover-usuario/{id}', function ($id) {
    try {
        $user = User::findOrFail($id);
        $user->delete();

        return 'Usuário removido com sucesso!';
    } catch (\Exception $e) {
        return 'Erro ao remover usuário: ' . $e->getMessage();
    }
});