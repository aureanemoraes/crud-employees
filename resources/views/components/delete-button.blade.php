<div>
    <form action="{{ $route }}" method="POST">
        @method('DELETE')
        @csrf
        <button
            type="submit"
            class="btn btn-sm btn-light m-1"
        >
            <i class="bi bi-trash" title="Remover"></i>
        </button>
    </form>
</div>
