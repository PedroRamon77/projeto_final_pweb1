<?php

namespace App\Http\Controllers;

use App\Models\Prontuario;
use Illuminate\Http\Request;

class ProntuarioController extends Controller
{
    public function index()
    {
        return response()->json(Prontuario::all(), 200);
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'descricao' => 'nullable|string'
        ]);

        $prontuario = Prontuario::create($dados);
        return response()->json($prontuario, 201);
    }

    public function show(Prontuario $prontuario)
    {
        return response()->json($prontuario, 200);
    }

    public function update(Request $request, Prontuario $prontuario)
    {
        $dados = $request->validate([
            'paciente_id' => 'sometimes|required|exists:pacientes,id',
            'descricao' => 'nullable|string'
        ]);

        $prontuario->update($dados);
        return response()->json($prontuario, 200);
    }

    public function destroy(Prontuario $prontuario)
    {
        $prontuario->delete();
        return response()->json(null, 204);
    }
}
