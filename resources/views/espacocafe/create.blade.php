@extends('projeto.layouts.app')

@section('content')
    <div class="text-center">

    @section('content')
        <div class="text-center">
            <div class="container mt-5">
                <h1 class="mb-4">Cadastrar Novo Espaço de Café</h1>

                <a href="{{ route('espacocafe.index') }}" class="btn btn-secondary mb-3">← Voltar</a>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('espacocafe.store') }}" method="POST">
                            @csrf

                            <!-- Nome do Espaço de Café -->
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome do Espaço de Café:</label>
                                <input type="text" name="nome" id="nome" class="form-control" required>
                            </div>

                            <!-- Lotação do Espaço de Café -->
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
        </div>
    @endsection

</div>
@endsection
