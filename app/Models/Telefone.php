<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Telefone extends Model
{
    use HasFactory;

    protected $table = 'telefones';

    protected $fillable = [
        'ddd',
        'numero',
        'tipo'
    ];

    protected function tipo(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtoupper($value),
        );
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}
