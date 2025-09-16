<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        return response()->json(Medico::all(), 200);
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string',
            'especialidade' => 'nullable|string',
            'telefone' => 'nullable|string',
            'email' => 'nullable|email'
        ]);

        $medico = Medico::create($dados);
        return response()->json($medico, 201);
    }

    public function show(Medico $medico)
    {
        return response()->json($medico, 200);
    }

    public function update(Request $request, Medico $medico)
    {
        $dados = $request->validate([
            'nome' => 'sometimes|required|string',
            'especialidade' => 'nullable|string',
            'telefone' => 'nullable|string',
            'email' => 'nullable|email'
        ]);

        $medico->update($dados);
        return response()->json($medico, 200);
    }

    public function destroy(Medico $medico)
    {
        $medico->delete();
        return response()->json(null, 204);
    }
}
