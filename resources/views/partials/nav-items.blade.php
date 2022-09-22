<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-sm btn-dark text-white"><i class="bi bi-door-open-fill" title="Sair"></i></button>
</form>
