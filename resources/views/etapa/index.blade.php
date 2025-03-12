@extends('projeto.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Etapas</h1>

        <!-- Mensagem de sucesso -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('etapa.create') }}" class="btn btn-primary mb-3">Nova Etapa</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Etapas</th> <!-- Removida a coluna ID -->
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($etapas as $etapa)
                    <tr>
                        <td>{{ $etapa->nome }}</td> <!-- Removida a coluna ID -->
                        <td>
                            <!-- Botão para visualizar as pessoas alocadas na etapa -->
                            <a href="{{ route('etapa.show', $etapa->id) }}" class="btn btn-sm btn-info">Visualizar</a>
                            
                            <!-- Botão de Excluir com Confirmação -->
                            <a href="{{ route('etapa.destroy', $etapa->id) }}" class="btn btn-sm btn-danger" 
                               onclick="event.preventDefault(); 
                                       if(confirm('Tem certeza que deseja excluir esta etapa? Todas as alocações associadas a ela serão removidas.')) {
                                           document.getElementById('delete-form-{{ $etapa->id }}').submit();
                                       }">
                                Excluir
                            </a>

                            <!-- Formulário de exclusão oculto -->
                            <form id="delete-form-{{ $etapa->id }}" action="{{ route('etapa.destroy', $etapa->id) }}" method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">Nenhuma etapa cadastrada.</td> <!-- Ajustado para 2 colunas -->
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
