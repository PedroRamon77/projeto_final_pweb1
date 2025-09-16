<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'tipo',
        'data',
        'resultado'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
