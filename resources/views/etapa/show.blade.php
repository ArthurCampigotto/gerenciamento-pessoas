@extends('projeto.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Pessoas Alocadas na Etapa: {{ $etapa->nome }}</h1>

        <!-- Mensagem de sucesso -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th> <!-- Removida a coluna ID -->
                </tr>
            </thead>
            <tbody>
                @forelse($alocacoes as $alocacao)
                    <tr>
                        <td>{{ $alocacao->pessoa->nome }} {{ $alocacao->pessoa->sobrenome }}</td> <!-- Exibição do nome completo -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Nenhuma pessoa alocada nesta etapa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('etapa.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection
