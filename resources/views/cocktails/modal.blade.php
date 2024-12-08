<!-- Modal de edición -->
<div class="modal fade" id="editModal{{ $cocktail->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Cóctel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cocktails.update', $cocktail->id ) }}" method="POST" id="editForm{{ $cocktail->id }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="cocktailId{{ $cocktail->id }}">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="cocktailName{{ $cocktail->id }}" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoría</label>
                        <input type="text" class="form-control" id="cocktailCategory{{ $cocktail->id }}" name="category" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
