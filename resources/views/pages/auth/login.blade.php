@extends('layouts.guest')

@section('content')
<div class="d-flex justify-content-center align-items-center flex-column w-100 h-100">
    @if($errors->any())
        <div class="alert alert-sm alert-danger" role="alert">
            {{ $errors->first() }}
        </div>
    @endif
    <div class="card text-bg-light mb-3 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
            <form action="{{ route('authenticate') }}" method="POST">
                @csrf

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text bg-dark text-light" id="addon-wrapping">@</span>
                    <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" aria-label="E-mail" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text bg-dark text-light" id="addon-wrapping"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha" aria-label="Senha" aria-describedby="addon-wrapping">

                    @error('password')
                        <div id="passwordFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end mb-3">
                    <button type="submit" class="btn btn-sm btn-dark">Entrar <i class="bi bi-door-closed-fill"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
