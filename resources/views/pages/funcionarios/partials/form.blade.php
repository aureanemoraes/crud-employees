@php
    if (isset($funcionario)) {
        $route = route('funcionario.update', $funcionario);
    } else {
        $route = route('funcionario.store');
    }


@endphp

<form action="{{ $route }}" method="POST">
    @if(isset($funcionario)) @method('PUT') @endif
    @csrf

    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" placeholder="#" value="{{ old('cpf', isset($funcionario) ? $funcionario->cpf : '') }}">
        <label for="cpf">CPF</label>

        @error('cpf')
            <div id="cpfFeedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" placeholder="#" maxlength="60" value="{{ old('nome', isset($funcionario) ? $funcionario->nome : '') }}">
        <label for="nome">Nome</label>

        @error('nome')
            <div id="nomeFeedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('carteira_trabalho') is-invalid @enderror" id="carteira_trabalho" name="carteira_trabalho" placeholder="#" maxlength="20" value="{{ old('carteira_trabalho', isset($funcionario) ? $funcionario->carteira_trabalho : '') }}">
        <label for="carteira_trabalho">Carteira de trabalho</label>

        @error('carteira_trabalho')
            <div id="carteiraTrabalhoFeedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <select class="form-select @error('setor') is-invalid @enderror" id="setor" name="setor" aria-label="Selecione o setor">
          <option selected disabled>Selecione...</option>
          <option value="vendas" {{ old('setor', isset($funcionario) ? $funcionario->setor->value : '') == 'vendas' ? 'selected' : '' }}>Vendas</option>
          <option value="escritorio" {{ old('setor', isset($funcionario) ? $funcionario->setor->value : '') == 'escritorio' ? 'selected' : '' }}>Escritório</option>
          <option value="estoque" {{ old('setor', isset($funcionario) ? $funcionario->setor->value : '') == 'estoque' ? 'selected' : '' }}>Estoque</option>
          <option value="administrativo" {{ old('setor', isset($funcionario) ? $funcionario->setor->value : '') == 'administrativo' ? 'selected' : '' }}>Administrativo</option>
        </select>
        <label for="setor">Setor</label>

        @error('setor')
            <div id="setorFeedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <div class="d-flex align-items-center my-1">
            <span for="telefones" class="">Telefones</span>
            <button type="button" class="ms-1 btn btn-sm btn-link" onClick="addTelefone()">
                <i class="bi bi-telephone-plus-fill"></i>
            </button>
        </div>
        <div id="telefone-input-container">
            @if(!is_null(old('telefones')) || (isset($funcionario) && count($funcionario->telefones) > 0) )
                @php
                    if (isset($funcionario)) {
                        $telefone_data = $funcionario->telefones;
                        $contador = count($funcionario->telefones);
                    } else {
                        $telefone_data = old('telefones');
                        $contador = count(old('telefones'));
                    }

                    // dd($telefone_data->toArray());
                @endphp

                @foreach($telefone_data as $index => $telefone)
                <div class="mb-3 telefone-input row {{ $index == 0 ? 'telefone-input-first' : 'telefone-input' }}" id="telefone-input-{{ $index }}">
                    <input type="hidden" class="input-id" name="telefones[{{$index}}][id]" value="{{ isset($telefone['id']) ? $telefone['id'] : '' }}">
                    <div class="col-sm input-group mb-1">
                        <span class="input-group-text">DDD</span>
                        <input type="text" class="form-control input-ddd @error('telefones.' . $index . '.ddd') is-invalid @enderror" name="telefones[{{ $index }}][ddd]" placeholder="(099)" value="{{ $telefone['ddd'] }}">

                        @error('telefones.' . $index . '.ddd')
                            <div id="telefonesFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm input-group mb-1">
                        <span class="input-group-text">Nº</span>
                        <input type="text" class="form-control input-numero @error('telefones.' . $index . '.numero') is-invalid @enderror" name="telefones[{{ $index }}][numero]" placeholder="98888-8888" value="{{ $telefone['numero'] }}">

                        @error('telefones.' . $index . '.numero')
                            <div id="telefonesFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm input-group mb-1">
                        <span class="input-group-text">Tipo</span>
                        <input type="text" class="form-control input-tipo @error('telefones.' . $index . '.tipo') is-invalid @enderror" name="telefones[{{ $index }}][tipo]" placeholder="Recado" value="{{ $telefone['tipo'] }}">

                        @error('telefones.' . $index . '.tipo')
                            <div id="telefonesFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-sm-1 mb-1">
                        <button {{ $index == 0 ? 'disabled' : '' }} type="button" class="ms-1 btn btn-sm btn-link" onClick="removeTelefone(this.parentElement.parentElement.id)">
                            <i class="bi bi-archive-fill"></i>
                        </button>
                    </div>
                </div>
                @endforeach
            @else
                <div class="mb-3 telefone-input telefone-input-first row" id="telefone-input-0">
                    <input type="hidden" class="input-id" name="telefones[0][id]" value="">

                    <div class="col-sm input-group mb-1">
                        <span class="input-group-text">DDD</span>
                        <input type="text" class="form-control input-ddd" name="telefones[0][ddd]" placeholder="(099)">
                    </div>
                    <div class="col-sm input-group mb-1">
                        <span class="input-group-text">Nº</span>
                        <input type="text" class="form-control input-numero" name="telefones[0][numero]" placeholder="98888-8888">
                    </div>
                    <div class="col-sm input-group mb-1">
                        <span class="input-group-text">Tipo</span>
                        <input type="text" class="form-control input-tipo" name="telefones[0][tipo]" placeholder="Recado">
                    </div>

                    <div class="col-sm-1 mb-1">
                        <button disabled type="button" class="ms-1 btn btn-sm btn-link" onClick="removeTelefone(this.parentElement.id)">
                            <i class="bi bi-archive-fill"></i>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="mb-3 d-flex justify-content-end">


        <button type="submit" class="btn btn-sm btn-dark">
            <div hidden class="spinner-border spinner-border-sm text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <span class="text-submit">Salvar</span>
        </button>
    </div>
</form>
