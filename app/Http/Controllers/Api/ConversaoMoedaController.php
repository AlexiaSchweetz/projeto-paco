<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VariacaoMoeda;

class ConversaoMoedaController extends Controller
{
    public function index(Request $request)
    {
        $query = VariacaoMoeda::query();
 
        if ($request->has('paginate') && $request->paginate) {
            return $query->paginate($request->get('paginate', 10));
        }

        return $query->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'moeda_origem' => 'required|string|max:10',
            'moeda_destino' => 'required|string|max:10',
            'valor' => 'required|numeric', 
            'convertido' => 'required|numeric' 
        ]);

        $conversao = VariacaoMoeda::create($validated);

        return response()->json($conversao, 201);
    }
}
