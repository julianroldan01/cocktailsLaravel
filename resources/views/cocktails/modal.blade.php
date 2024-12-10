<!-- Modal de edición -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Cóctel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cocktails.update', 0 ) }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="cocktailId">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="cocktailName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoría</label>
                        <input type="text" class="form-control" id="cocktailCategory" name="category">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>