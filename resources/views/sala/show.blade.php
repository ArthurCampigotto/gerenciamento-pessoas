@extends('projeto.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Pessoas Alocadas na Sala: {{ $sala->nome }}</h1>

        <a href="{{ route('sala.index') }}" class="btn btn-secondary mb-3">← Voltar para Salas</a>

        @if($pessoas->isEmpty())
            <p>Não há pessoas alocadas nesta sala.</p>
        @else
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th> <!-- Removida a coluna ID -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($pessoas as $pessoa)
                        <tr>
                            <td>{{ $pessoa->nome }} {{ $pessoa->sobrenome }}</td> <!-- Exibição apenas do nome completo -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
