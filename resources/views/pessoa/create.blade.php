@extends('projeto.layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nova Pessoa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container mt-5">
            <h1 class="mb-4">Cadastrar Nova Pessoa</h1>

            <a href="{{ route('pessoa.index') }}" class="btn btn-secondary mb-3">← Voltar</a>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pessoa.store') }}" method="POST">
                        @csrf

                        <!-- Nome -->
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" name="nome" id="nome" class="form-control" required>
                        </div>

                        <!-- Sobrenome -->
                        <div class="mb-3">
                            <label for="sobrenome" class="form-label">Sobrenome:</label>
                            <input type="text" name="sobrenome" id="sobrenome" class="form-control" required>
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
@endsection
