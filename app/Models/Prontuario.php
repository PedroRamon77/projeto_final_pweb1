<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prontuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'descricao'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
