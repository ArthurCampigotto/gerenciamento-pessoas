@extends('projeto.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Editar Alocação</h1>

        <form action="{{ route('alocacao.update', $alocacao->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="pessoa_id" class="form-label">Pessoa</label>
                <select id="pessoa_id" name="pessoa_id" class="form-control">
                    @foreach($pessoas as $pessoa)
                        <option value="{{ $pessoa->id }}" {{ $pessoa->id == $alocacao->pessoa_id ? 'selected' : '' }}>
                            {{ $pessoa->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="sala_id" class="form-label">Sala</label>
                <select id="sala_id" name="sala_id" class="form-control">
                    @foreach($salas as $sala)
                        <option value="{{ $sala->id }}" {{ $sala->id == $alocacao->sala_id ? 'selected' : '' }}>
                            {{ $sala->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="sala_cafe_id" class="form-label">Espaço de Café</label>
                <select id="sala_cafe_id" name="sala_cafe_id" class="form-control">
                    @foreach($salasCafe as $salaCafe)
                        <option value="{{ $salaCafe->id }}" {{ $salaCafe->id == $alocacao->sala_cafe_id ? 'selected' : '' }}>
                            {{ $salaCafe->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="etapa_id" class="form-label">Etapa</label>
                <select id="etapa_id" name="etapa_id" class="form-control">
                    @foreach($etapas as $etapa)
                        <option value="{{ $etapa->id }}" {{ $etapa->id == $alocacao->etapa_id ? 'selected' : '' }}>
                            {{ $etapa->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Atualizar Alocação</button>
        </form>
    </div>
@endsection
