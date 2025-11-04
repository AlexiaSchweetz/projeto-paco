<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VariacaoMoeda;

class ConversaoMoedaController extends Controller
{
    // GET /api/variacoes
    public function index(Request $request)
    {
        $query = VariacaoMoeda::query();

        // Filtro opcional por par
        if ($request->has('par_moeda')) {
            $query->where('par_moeda', $request->par_moeda);
        }
 
        // Retorna paginado ou tudo
        if ($request->has('paginate') && $request->paginate) {
            return $query->paginate($request->get('paginate', 10));
        }

        return $query->get();
    }

    // POST /api/conversoes
    public function store(Request $request)
    {
        $validated = $request->validate([
            'par_moeda' => 'required|string|max:10',
            'valor' => 'required|numeric', 
        ]);

        $conversao = VariacaoMoeda::create($validated);

        return response()->json($conversao, 201);
    }
}
