<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sala;
use App\Models\AlocacaoPessoa; 
use App\Models\Pessoa;
use Illuminate\Http\Request;

class ReuniaoController extends Controller
{
    public function index()
    {
        $salas = Sala::all();
        return view('sala.index', compact('salas'));
    }

    public function create()
    {
        return view('sala.create');
    }

    public function store(Request $request)
    {
        // Validação dos campos antes de salvar
        $request->validate([
            'nome' => 'required|string|max:255',
            'lotacao' => 'required|integer|min:1|max:15', // Lotação máxima de 15 pessoas
        ]);

        Sala::create($request->all());

        return redirect()->route('sala.index')->with('success', 'Sala cadastrada com sucesso!');
    }

    // Novo método show para exibir as pessoas alocadas em uma sala
    public function show($id)
    {
        // Consultar a sala
        $sala = Sala::findOrFail($id);

        // Consultar as pessoas alocadas na sala
        $pessoas = AlocacaoPessoa::where('sala_id', $id)
            ->with('pessoa') // Carregar as pessoas associadas
            ->get()
            ->pluck('pessoa'); // Extrair somente as pessoas

        // Consultar a quantidade de pessoas alocadas
        $lotacaoAtual = $pessoas->count();

        // Exibir o template da sala e as pessoas alocadas
        return view('sala.show', compact('sala', 'pessoas', 'lotacaoAtual'));
    }

    // Método para alocar uma pessoa em uma sala
    public function alocarPessoa(Request $request, $id)
    {
        // Validar se a pessoa já foi alocada nesta sala
        $pessoaId = $request->pessoa_id;
        $sala = Sala::findOrFail($id);
        $lotacaoAtual = AlocacaoPessoa::where('sala_id', $id)->count();

        // Verificar se a lotação foi atingida
        if ($lotacaoAtual >= $sala->lotacao) {
            return redirect()->route('sala.show', $id)->with('error', 'A lotação da sala foi atingida. Não é possível alocar mais pessoas.');
        }

        // Verificar se a pessoa já está alocada na sala
        $pessoaAlocada = AlocacaoPessoa::where('sala_id', $id)->where('pessoa_id', $pessoaId)->first();
        if ($pessoaAlocada) {
            return redirect()->route('sala.show', $id)->with('error', 'Esta pessoa já está alocada nesta sala.');
        }

        // Alocar a pessoa na sala
        AlocacaoPessoa::create([
            'pessoa_id' => $pessoaId,
            'sala_id' => $id,
        ]);

        return redirect()->route('sala.show', $id)->with('success', 'Pessoa alocada na sala com sucesso!');
    }

    // Método para excluir uma alocação de uma pessoa da sala
    public function desocuparPessoa($id)
    {
        $alocacao = AlocacaoPessoa::findOrFail($id);
        $alocacao->delete();

        return redirect()->route('sala.show', $alocacao->sala_id)->with('success', 'Pessoa desocupada da sala com sucesso!');
    }

    // Método para excluir uma sala e as alocações associadas
    public function destroy($id)
    {
        // Consultar a sala
        $sala = Sala::findOrFail($id);

        // Verificar se existem alocações para a sala
        $alocacoes = AlocacaoPessoa::where('sala_id', $id)->count();
        if ($alocacoes > 0) {
            // Remover todas as alocações associadas a esta sala
            AlocacaoPessoa::where('sala_id', $id)->delete();
        }

        // Excluir a sala
        $sala->delete();

        return redirect()->route('sala.index')->with('success', 'Sala excluída com sucesso!');
    }
}
