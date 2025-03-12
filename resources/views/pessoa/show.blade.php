@extends('projeto.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Detalhes da Pessoa - {{ $pessoa->nome }} {{ $pessoa->sobrenome }}</h1>

        <a href="{{ route('pessoa.index') }}" class="btn btn-secondary mb-3">← Voltar</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID da Alocação</th>
                    <th>Sala</th>
                    <th>Espaço de Café</th>
                    <th>Etapa</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse($alocacoes as $alocacao)
                    <tr>
                        <td>{{ $alocacao->id }}</td>
                        <td>{{ $alocacao->sala->nome }}</td>
                        <td>{{ $alocacao->salaCafe->nome ?? 'Nenhum espaço de café alocado' }}</td>
                        <td>{{ $alocacao->etapa->nome }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nenhuma alocação encontrada para esta pessoa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
