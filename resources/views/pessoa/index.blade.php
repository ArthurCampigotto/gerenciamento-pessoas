@extends('projeto.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Pessoas</h1>

        <!-- Mensagem de sucesso -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('pessoa.create') }}" class="btn btn-primary mb-3">Nova Pessoa</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Pessoas</th> <!-- Removida a coluna ID -->
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pessoas as $pessoa)
                    <tr>
                        <td>{{ $pessoa->nome }} {{ $pessoa->sobrenome }}</td> <!-- Removida a coluna ID -->
                        <td>
                            <!-- Botão Visualizar -->
                            <a href="{{ route('pessoa.show', $pessoa->id) }}" class="btn btn-sm btn-info">Visualizar</a>

                            <!-- Formulário para deletar a pessoa -->
                            <form action="{{ route('pessoa.destroy', $pessoa->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta pessoa?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
