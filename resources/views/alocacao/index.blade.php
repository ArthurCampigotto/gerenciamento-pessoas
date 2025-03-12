@extends('projeto.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Alocações</h1>

        <!-- Mensagem de sucesso -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('alocacao.create') }}" class="btn btn-primary mb-3">Nova Alocação</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Pessoa</th>
                    <th>Sala</th>
                    <th>Espaço de Café</th>
                    <th>Etapa</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($alocacoes as $alocacao)
                    <tr>
                        <td>{{ $alocacao->id }}</td>
                        <td>{{ $alocacao->pessoa->nome }}</td>
                        <td>{{ $alocacao->sala->nome }}</td>
                        <td>{{ $alocacao->salaCafe->nome }}</td>
                        <td>{{ $alocacao->etapa->nome }}</td>
                        <td>
                            <!-- Botão de Edição -->
                            <a href="{{ route('alocacao.edit', $alocacao->id) }}" class="btn btn-sm btn-warning">Editar</a>

                            <!-- Botão de exclusão -->
                            <form action="{{ route('alocacao.destroy', $alocacao->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta alocação?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Nenhuma alocação cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
