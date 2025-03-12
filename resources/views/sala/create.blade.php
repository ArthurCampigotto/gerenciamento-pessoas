@extends('projeto.layouts.app')

@section('content')
    <div class="text-center">
        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Cadastrar Nova Sala</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>

        <body>
            <div class="container mt-5">
                <h1 class="mb-4">Cadastrar Nova Sala</h1>

                <a href="{{ route('sala.index') }}" class="btn btn-secondary mb-3">← Voltar</a>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('sala.store') }}" method="POST">
                            @csrf

                            <!-- Nome da Sala -->
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome da Sala:</label>
                                <input type="text" name="nome" id="nome" class="form-control" required>
                            </div>

                            <!-- Lotação da Sala -->
                            <div class="mb-3">
                                <label for="lotacao" class="form-label">Lotação (máx 15 pessoas):</label>
                                <input type="number" name="lotacao" id="lotacao" class="form-control" required
                                    min="1" max="15">
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
