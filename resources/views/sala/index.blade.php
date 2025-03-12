@extends('projeto.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Salas</h1>

        <!-- Mensagem de sucesso -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('sala.create') }}" class="btn btn-primary mb-3">Nova Sala</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th> <!-- Removida a coluna ID -->
                    <th>Lotação Atual</th> <!-- Nova coluna para mostrar a lotação -->
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($salas as $sala)
                    <tr>
                        <td>{{ $sala->nome }}</td> <!-- Removida a coluna ID -->
                        <td>{{ $sala->alocacoes->count() }} {{ $sala->lotacao }}</td> <!-- Exibe a lotação atual e a lotação máxima -->
                        <td>
                            <a href="{{ route('sala.show', $sala->id) }}" class="btn btn-sm btn-info">Visualizar</a>
                             <!-- Botão de Excluir com Confirmação -->
                            <a href="#" class="btn btn-sm btn-danger" 
                               onclick="event.preventDefault(); 
                                       if(confirm('Tem certeza que deseja excluir esta sala? Todas as alocações associadas a ela serão removidas.')) {
                                           document.getElementById('delete-form-{{ $sala->id }}').submit();
                                       }">
                                Excluir
                            </a>

                            <!-- Formulário de exclusão oculto -->
                            <form id="delete-form-{{ $sala->id }}" action="{{ route('sala.destroy', $sala->id) }}" method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Nenhuma sala cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
