<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlocacaoPessoa;
use App\Models\Pessoa;
use App\Models\Sala;
use App\Models\SalaCafe;
use App\Models\Etapa;
use Illuminate\Http\Request;

class AlocacaoPessoaController extends Controller
{
  public function index()
  {
    $alocacoes = AlocacaoPessoa::with(['pessoa', 'sala', 'salaCafe', 'etapa'])->get();
    return view('alocacao.index', compact('alocacoes'));
  }

  public function create()
  {
    $pessoas = Pessoa::all();
    $salas = Sala::all();
    $salasCafe = SalaCafe::all();
    $etapas = Etapa::all();

    return view('alocacao.create', compact('pessoas', 'salas', 'salasCafe', 'etapas'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'pessoa_id' => 'required|exists:pessoas,id',
      'sala_id' => 'required|exists:salas,id',
      'sala_cafe_id' => 'required|exists:salas_cafe,id',
      'etapa_id' => 'required|exists:etapas,id',
    ]);

    AlocacaoPessoa::create($request->all());

    return redirect()->route('alocacao.index')->with('success', 'Alocação criada com sucesso!');
  }

  public function edit($id)
  {
    $alocacao = AlocacaoPessoa::findOrFail($id);
    $pessoas = Pessoa::all();
    $salas = Sala::all();
    $salasCafe = SalaCafe::all();
    $etapas = Etapa::all();

    return view('alocacao.edit', compact('alocacao', 'pessoas', 'salas', 'salasCafe', 'etapas'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'pessoa_id' => 'required|exists:pessoas,id',
      'sala_id' => 'required|exists:salas,id',
      'sala_cafe_id' => 'required|exists:salas_cafe,id',
      'etapa_id' => 'required|exists:etapas,id',
    ]);

    // Encontrar a alocação e atualizar com os dados do formulário
    $alocacao = AlocacaoPessoa::findOrFail($id);
    $alocacao->update($request->all());

    return redirect()->route('alocacao.index')->with('success', 'Alocação atualizada com sucesso!');
  }

  public function destroy($id)
  {
    // Consultar a alocação de pessoa
    $alocacao = AlocacaoPessoa::findOrFail($id);

    // Excluir a alocação
    $alocacao->delete();

    return redirect()->route('alocacao.index')->with('success', 'Alocação excluída com sucesso!');
  }
}
