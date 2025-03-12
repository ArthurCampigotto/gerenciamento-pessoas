@extends('projeto.layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nova Alocação</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container mt-5">
            <h1 class="mb-4">Nova Alocação</h1>

            <a href="{{ route('alocacao.index') }}" class="btn btn-secondary mb-3">← Voltar</a>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('alocacao.store') }}" method="POST">
                        @csrf

                        <!-- Pessoa -->
                        <div class="mb-3">
                            <label for="pessoa_id" class="form-label">Pessoa:</label>
                            <select name="pessoa_id" id="pessoa_id" class="form-select" required>
                                <option value="">Selecione uma pessoa</option>
                                @foreach ($pessoas as $pessoa)
                                    <option value="{{ $pessoa->id }}">{{ $pessoa->nome }} {{ $pessoa->sobrenome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sala -->
                        <div class="mb-3">
                            <label for="sala_id" class="form-label">Sala:</label>
                            <select name="sala_id" id="sala_id" class="form-select" required>
                                <option value="">Selecione uma sala</option>
                                @foreach ($salas as $sala)
                                    <option value="{{ $sala->id }}">{{ $sala->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sala de Café -->
                        <div class="mb-3">
                            <label for="sala_cafe_id" class="form-label">Sala de Café:</label>
                            <select name="sala_cafe_id" id="sala_cafe_id" class="form-select" required>
                                <option value="">Selecione uma sala de café</option>
                                @foreach ($salasCafe as $salaCafe)
                                    <option value="{{ $salaCafe->id }}">{{ $salaCafe->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Etapa -->
                        <div class="mb-3">
                            <label for="etapa_id" class="form-label">Etapa:</label>
                            <select name="etapa_id" id="etapa_id" class="form-select" required>
                                <option value="">Selecione uma etapa</option>
                                @foreach ($etapas as $etapa)
                                    <option value="{{ $etapa->id }}">{{ $etapa->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Botão de envio -->
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>


    </div>
@endsection
