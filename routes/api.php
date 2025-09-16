<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ExameController;
use App\Http\Controllers\ProntuarioController;

Route::apiResource('pacientes', PacienteController::class);
Route::apiResource('medicos', MedicoController::class);
Route::apiResource('agendas', AgendaController::class);
Route::apiResource('exames', ExameController::class);
Route::apiResource('prontuarios', ProntuarioController::class);
