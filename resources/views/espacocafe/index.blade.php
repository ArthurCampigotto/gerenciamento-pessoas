@extends('projeto.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Espaços de Café</h1>

        <!-- Mensagem de sucesso -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('espacocafe.create') }}" class="btn btn-primary mb-3">Novo Espaço de Café</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th> <!-- Removida a coluna ID -->
                    <th>Lotação atual</th> <!-- Coluna de Lotação -->
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cafes as $espacoCafe)
                    <tr>
                        <td>{{ $espacoCafe->nome }}</td> <!-- Removida a coluna ID -->
                        <td>{{ $espacoCafe->alocacoes->count() }}  {{ $espacoCafe->lotacao }}</td> <!-- Exibição da lotação atual e máxima -->
                        <td>
                            <!-- Botão Visualizar -->
                            <a href="{{ route('espacocafe.show', $espacoCafe->id) }}" class="btn btn-sm btn-info">Visualizar</a>

                            <!-- Formulário para deletar o espaço de café -->
                            <form action="{{ route('espacocafe.destroy', $espacoCafe->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este espaço de café?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
