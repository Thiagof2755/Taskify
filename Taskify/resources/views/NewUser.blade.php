@extends('master')

@section('content')
    <a href="{{ route('login.index') }}">Login</a>

    <h2>Cadastro de Novo Usuário</h2>

    <form action="{{ route('create') }}" method="post">
        @csrf
        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <button type="submit">Cadastrar</button>
        </div>
    </form>
@endsection
