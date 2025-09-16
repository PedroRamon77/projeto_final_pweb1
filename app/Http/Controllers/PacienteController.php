<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        return response()->json(Paciente::all(), 200);
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string',
            'cpf' => 'required|string|unique:pacientes,cpf',
            'email' => 'nullable|email',
            'telefone' => 'nullable|string',
            'endereco' => 'nullable|string',
            'data_nascimento' => 'nullable|date'
        ]);

        $paciente = Paciente::create($dados);
        return response()->json($paciente, 201);
    }

    public function show(Paciente $paciente)
    {
        return response()->json($paciente, 200);
    }

    public function update(Request $request, Paciente $paciente)
    {
        $dados = $request->validate([
            'nome' => 'sometimes|required|string',
            'cpf' => 'sometimes|required|string|unique:pacientes,cpf,' . $paciente->id,
            'email' => 'nullable|email',
            'telefone' => 'nullable|string',
            'endereco' => 'nullable|string',
            'data_nascimento' => 'nullable|date'
        ]);

        $paciente->update($dados);
        return response()->json($paciente, 200);
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return response()->json(null, 204);
    }
}
