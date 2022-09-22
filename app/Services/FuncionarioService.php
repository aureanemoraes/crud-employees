<?php

namespace App\Services;

use App\Models\Funcionario;

class FuncionarioService
{
    public function list() {
        return Funcionario::paginate();
    }

    public function save($funcionario_data) {

        $telefone_data = $this->filterPhones($funcionario_data);

        $funcionario = Funcionario::create($funcionario_data);
        $funcionario->telefones()->createMany($telefone_data);

        session()->flash('message', ['status' => 'success', 'body' => 'Funcionário adicionado com sucesso!']);

        return $funcionario;
    }

    public function update($funcionario_data, $funcionario) {
        $funcionario->fill($funcionario_data)->save();

        $telefone_data = $this->filterPhones($funcionario_data);
        $telefone_to_keep = $this->filterPhonesIds($telefone_data);
        $telefone_to_create = $this->filterPhoneToCreate($telefone_data);

        $funcionario->telefones()->whereNotIn('id', $telefone_to_keep)->delete();
        $funcionario->telefones()->createMany($telefone_to_create);

        session()->flash('message', ['status' => 'success', 'body' => 'Funcionário atualizado com sucesso!']);

        return $funcionario;
    }

    public function delete($funcionario) {
        session()->flash('message', ['status' => 'success', 'body' => 'Funcionário excluído com sucesso!']);

        return $funcionario->delete();
    }

    private function filterPhones($funcionario_data) {
        return array_filter($funcionario_data['telefones'],
            fn ($telefone) => !is_null($telefone['ddd']) && !is_null($telefone['numero'])
        );
    }

    private function filterPhonesIds($telefone_data) {
        return array_column(array_filter($telefone_data, fn($telefone) => !empty($telefone['id'])), 'id');
    }

    private function filterPhoneToCreate($telefone_data) {
        return array_filter($telefone_data, fn($telefone) => empty($telefone['id']));
    }
}
