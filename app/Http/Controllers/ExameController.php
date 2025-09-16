<?php

namespace App\Http\Controllers;

use App\Models\Exame;
use Illuminate\Http\Request;

class ExameController extends Controller
{
    public function index()
    {
        return response()->json(Exame::all(), 200);
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'nome' => 'required|string',
            'descricao' => 'nullable|string',
            'data' => 'nullable|date'
        ]);

        $exame = Exame::create($dados);
        return response()->json($exame, 201);
    }

    public function show(Exame $exame)
    {
        return response()->json($exame, 200);
    }

    public function update(Request $request, Exame $exame)
    {
        $dados = $request->validate([
            'paciente_id' => 'sometimes|required|exists:pacientes,id',
            'nome' => 'sometimes|required|string',
            'descricao' => 'nullable|string',
            'data' => 'nullable|date'
        ]);

        $exame->update($dados);
        return response()->json($exame, 200);
    }

    public function destroy(Exame $exame)
    {
        $exame->delete();
        return response()->json(null, 204);
    }
}
