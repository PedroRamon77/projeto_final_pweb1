<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'telefone',
        'endereco',
        'data_nascimento'
    ];

    public function agendas()
    {
        return $this->hasMany(Agenda::class);
    }

    public function exames()
    {
        return $this->hasMany(Exame::class);
    }

    public function prontuarios()
    {
        return $this->hasMany(Prontuario::class);
    }
}
