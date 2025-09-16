<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        return response()->json(Agenda::all(), 200);
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'data_hora' => 'required|date',
            'observacoes' => 'nullable|string'
        ]);

        $agenda = Agenda::create($dados);
        return response()->json($agenda, 201);
    }

    public function show(Agenda $agenda)
    {
        return response()->json($agenda, 200);
    }

    public function update(Request $request, Agenda $agenda)
    {
        $dados = $request->validate([
            'paciente_id' => 'sometimes|required|exists:pacientes,id',
            'medico_id' => 'sometimes|required|exists:medicos,id',
            'data_hora' => 'sometimes|required|date',
            'observacoes' => 'nullable|string'
        ]);

        $agenda->update($dados);
        return response()->json($agenda, 200);
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return response()->json(null, 204);
    }
}
