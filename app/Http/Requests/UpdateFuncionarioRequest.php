<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

use App\Enums\SetorFuncionario;

class UpdateFuncionarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function withValidator($validator)
    {
        session()->flash('message', ['status' => 'error', 'body' => 'Campos inválidos. Por favor, preencha corretamente!']);
    }

    public function rules()
    {
        return [
            'cpf' => 'required|cpf|size:14|string',
            'nome' => 'required|string|max:60',
            'carteira_trabalho' => 'required|string|max:20',
            'setor' => ['required', new Enum(SetorFuncionario::class)],
            'telefones.0.ddd' => 'required|string',
            'telefones.0.numero' => 'required|string',
            'telefones.0.tipo' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'telefones.0.ddd' => 'DDD',
            'telefones.0.numero' => 'nº',
            'telefones.0.tipo' => 'tipo'
        ];
    }
}
