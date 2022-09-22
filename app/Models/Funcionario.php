<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

use App\Enums\SetorFuncionario;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';

    protected $fillable = [
        'cpf',
        'nome',
        'carteira_trabalho',
        'setor'
    ];

    protected $casts = [
        'setor' => SetorFuncionario::class
    ];

    protected function nome(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtoupper($value),
        );
    }

    public function telefones()
    {
        return $this->hasMany(Telefone::class);
    }
}
