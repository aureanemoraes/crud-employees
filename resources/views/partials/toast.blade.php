<style>
    .z-index-5 {
        z-index: 5;
    }
</style>

@if(session()->has('message'))
    @php
        switch (session('message.status')) {
            case 'success':
                $class = 'text-success';
                $text = 'Sucesso';
                $icon = 'bi bi-check-square-fill';
            break;
            case 'error':
                $class = 'text-danger';
                $text = 'Erro';
                $icon = 'bi bi-x-square-fill';
            break;
            default:
                $class = 'text-secondary';
                $text = 'Alerta';
                $icon = 'bi bi-exclamation-square-fill';
        }
    @endphp
    <div aria-live="polite" aria-atomic="true" class="position-static">
        <div class="toast-container bottom-0 end-0 mb-1 me-1 z-index-5">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="toastDefault">
                <div class="toast-header">
                    <i class="{{ $icon }} {{ $class }}"></i>
                    <strong class="me-auto ms-1 {{ $class }}">{{ $text }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                {{ session('message.body') }}
                </div>
            </div>
        </div>
    </div>
@endif
