<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="deleteModalBody">
                <p>Você tem certeza que deseja excluir o funcionário?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Não</button>
                <form action="" method="POST" id="deleteForm">
                    @method('DELETE')
                    @csrf
                    <button
                        type="submit"
                        class="btn btn-sm btn-light m-1"
                    >
                        Sim
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
