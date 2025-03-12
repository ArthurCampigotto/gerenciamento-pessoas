<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use App\Models\AlocacaoPessoa;
use App\Models\Sala;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('pessoa.index', compact('pessoas'));
    }

    public function create()
    {
        return view('pessoa.create');
    }

    public function store(Request $request)
    {
        Pessoa::create($request->all());
        return redirect()->route('pessoa.index');
    }

    public function show($id)
    {
        // Consultar as alocações da pessoa
        $pessoa = Pessoa::findOrFail($id);
        $alocacoes = AlocacaoPessoa::where('pessoa_id', $id)
            ->with(['sala', 'etapa', 'salaCafe']) // Carregar a sala, etapa e espaço de café associadas
            ->get();

        return view('pessoa.show', compact('pessoa', 'alocacoes'));
    }

    // Novo método para listar as pessoas de uma sala específica
    public function pessoasNaSala($id)
    {
        $sala = Sala::findOrFail($id);
        $alocacoes = AlocacaoPessoa::where('sala_id', $id)
            ->with('pessoa') // Carregar a pessoa associada
            ->get();

        return view('sala.pessoas', compact('sala', 'alocacoes'));
    }

    // Método para excluir uma pessoa
    public function destroy($id)
    {
        // Primeiro, verificar se há alocações associadas à pessoa
        $alocacoes = AlocacaoPessoa::where('pessoa_id', $id)->get();
        
        // Excluir as alocações antes de excluir a pessoa (se necessário)
        foreach ($alocacoes as $alocacao) {
            $alocacao->delete();
        }

        // Excluir a pessoa
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->delete();

        return redirect()->route('pessoa.index')->with('success', 'Pessoa excluída com sucesso!');
    }
}
