<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Etapa;
use App\Models\AlocacaoPessoa;
use Illuminate\Http\Request;

class EtapaController extends Controller
{
    public function index()
    {
        $etapas = Etapa::all();
        return view('etapa.index', compact('etapas'));
    }

    public function create()
    {
        return view('etapa.create');
    }

    public function store(Request $request)
    {
        // Validação dos campos antes de salvar
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        // Criando a nova etapa
        Etapa::create($request->all());

        return redirect()->route('etapa.index')->with('success', 'Etapa cadastrada com sucesso!');
    }

    public function show($id)
    {
        // Consultar as alocações das pessoas na etapa
        $etapa = Etapa::findOrFail($id);
        $alocacoes = AlocacaoPessoa::where('etapa_id', $id)
            ->with(['pessoa']) // Carregar a pessoa associada
            ->get();

        return view('etapa.show', compact('etapa', 'alocacoes'));
    }

    public function destroy($id)
    {
        // Consultar a etapa
        $etapa = Etapa::findOrFail($id);
    
        // Antes de excluir a etapa, verificamos se há alocações
        $alocacoes = AlocacaoPessoa::where('etapa_id', $id)->get();
        
        if ($alocacoes->isNotEmpty()) {
            // Se houver pessoas alocadas, pode-se desejar tratá-las (como excluir as alocações primeiro)
            foreach ($alocacoes as $alocacao) {
                $alocacao->delete(); // Exclui a alocação
            }
        }
    
        // Agora podemos excluir a etapa
        $etapa->delete();
    
        return redirect()->route('etapa.index')->with('success', 'Etapa excluída com sucesso!');
    }
    
}
