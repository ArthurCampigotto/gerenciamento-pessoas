<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SalaCafe;
use App\Models\AlocacaoPessoa;
use Illuminate\Http\Request;

class EspacoCafeController extends Controller
{
    public function index()
    {
        $cafes = SalaCafe::all();
        return view('espacocafe.index', compact('cafes'));
    }

    public function create()
    {
        return view('espacocafe.create');
    }

    public function store(Request $request)
    {
        // Validação dos campos antes de salvar
        $request->validate([
            'nome' => 'required|string|max:255',
            'lotacao' => 'required|integer|min:1|max:15', // Lotação máxima de 15 pessoas
        ]);

        // Criando o novo espaço de café
        SalaCafe::create($request->all());

        return redirect()->route('espacocafe.index')->with('success', 'Espaço de café cadastrado com sucesso!');
    }

    public function show($id)
    {
        // Consultar as alocações das pessoas no espaço de café
        $espacoCafe = SalaCafe::findOrFail($id);
        $alocacoes = AlocacaoPessoa::where('sala_cafe_id', $id)
            ->with(['pessoa']) // Carregar a pessoa associada
            ->get();

        return view('espacocafe.show', compact('espacoCafe', 'alocacoes'));
    }

    public function destroy($id)
    {
        // Consultar o espaço de café
        $espacoCafe = SalaCafe::findOrFail($id);

        // Antes de excluir o espaço de café, verificamos se há alocações
        $alocacoes = AlocacaoPessoa::where('sala_cafe_id', $id)->get();
        if ($alocacoes->isNotEmpty()) {
            // Se houver pessoas alocadas, pode-se desejar tratá-las (como excluir as alocações primeiro)
            foreach ($alocacoes as $alocacao) {
                $alocacao->delete(); // Exclui a alocação
            }
        }

        // Agora podemos excluir o espaço de café
        $espacoCafe->delete();

        return redirect()->route('espacocafe.index')->with('success', 'Espaço de café excluído com sucesso!');
    }
}
