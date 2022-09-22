@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('funcionario.create') }}" type="button" class="btn btn-sm btn-dark">Novo</a>
    </div>
    {{-- @if(session()->has('message'))
        @include('partials.toast', ['message' => session('message')])
    @endif --}}

{{-- {{dd($funcionarios)}} --}}
    <div class="table-responsive table-responsive-sm">
        <table class="table table-sm table-hover align-middle">
            <thead>
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Setor</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($funcionarios as $funcionario)
                    <tr>
                        <td>{{ $funcionario->cpf }}</td>
                        <td>{{ $funcionario->nome }}</td>
                        <td>{{ $funcionario->setor->name }}</td>
                        <td class="d-flex justify-content-end">
                            <a
                                href="{{ route('funcionario.edit', $funcionario) }}"
                                type="button"
                                class="btn btn-sm btn-light m-1"
                            >
                                <i class="bi bi-pencil-square" title="Alterar"></i>
                            </a>

                            <button
                                type="button"
                                class="btn btn-sm btn-light m-1"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal"
                                onClick="deleteItem('{{ $funcionario->nome }}', '{{ route('funcionario.destroy', $funcionario) }}')"
                            >
                                <i class="bi bi-trash" title="Remover"></i>
                            </button>

                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>

        @include('partials.pagination', ['paginator' => $funcionarios])
    </div>
    @include('partials.delete-modal')
@endsection

@section('js')
    <script type="text/javascript">
        function deleteItem(title, route) {
            $('#deleteModalLabel').text(title);
            $('#deleteForm').attr('action', route);
        }


    </script>
@endsection
