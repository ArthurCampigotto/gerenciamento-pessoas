@extends('projeto.layouts.app')

@section('content')
    <div class="text-center">

        @section('content')
            <div class="text-center">
                <div class="container mt-5">
                    <h1 class="mb-4">Cadastrar Nova Etapa</h1>
        
                    <a href="{{ route('etapa.index') }}" class="btn btn-secondary mb-3">← Voltar</a>
        
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('etapa.store') }}" method="POST">
                                @csrf
        
                                <!-- Nome da Etapa -->
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome da Etapa:</label>
                                    <input type="text" name="nome" id="nome" class="form-control" required>
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
