@extends('layouts.app')

@section('breadcrumb')
    @include('partials.breadcrumb', [
        'items' => [
            [
                'type' => 'link',
                'url' => route('funcionario.index'),
                'name' => 'Funcionários'
            ],
            [
                'type' => 'current',
                'name' => 'Alterar'
            ]
        ]
    ])
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @php $contador = 0 @endphp
            @include('pages.funcionarios.partials.form')
        </div>
    </div>
@endsection

@section('js')
    <script>
        let id;

        function addTelefone() {
            id++;

            $('.telefone-input-first')
                .clone()
                .removeClass('telefone-input-first')
                .attr('id', `telefone-input-${id}`)
                .appendTo('#telefone-input-container');

            $(`div#telefone-input-${id} button`).removeAttr('disabled');
            $(`div#telefone-input-${id} input`).val('');
            $(`div#telefone-input-${id} input`).removeClass('is-invalid');
            $(`div#telefone-input-${id} .input-ddd`).attr('name', `telefones[${id}][ddd]`);
            $(`div#telefone-input-${id} .input-numero`).attr('name', `telefones[${id}][numero]`);
            $(`div#telefone-input-${id} .input-tipo`).attr('name', `telefones[${id}][tipo]`);
            $(`div#telefone-input-${id} .input-id`).attr('name', `telefones[${id}][id]`);

            loadMask();
        }

        function removeTelefone(inputId) {
            $(`#${inputId}`).remove();
            console.log(inputId);
        }

        function loadMask() {
            $('#cpf').inputmask('999.999.999-99');
            $('.input-ddd').inputmask('(099)');
            $('.input-numero').inputmask('9 9999-9999');
        }

        $('form').on('submit', () => {
            $('.spinner-border').removeAttr('hidden');
            $('.text-submit').attr('hidden', true);
        });

        $(function() {
            id = $('.telefone-input').length - 1;

            loadMask();
        });
    </script>
@endsection
