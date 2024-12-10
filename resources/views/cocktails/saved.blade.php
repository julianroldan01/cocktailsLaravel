@extends('layouts.app')

@section('content')
<div class="container-fluid bg-white" style="min-height: 100vh; padding-top: 20px; background-image: url('https://images.unsplash.com/photo-1570716893556-8cae2e541ba8?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover; background-position: center; background-attachment: fixed;">
    <h1 class="my-3 text-center fs-3 text-white">Cócteles Guardados</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cocktails as $cocktail)
            <tr>
                <td>{{ $cocktail->name }}</td>
                <td>{{ $cocktail->category }}</td>
                <td>
                    <!-- Botón de Editar con datos del cóctel -->
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal"
                        data-name="{{ $cocktail->name }}"
                        data-category="{{ $cocktail->category }}"
                        data-id="{{ $cocktail->id }}">
                        Editar
                    </button>


                    <!-- Botón de Eliminar -->
                    <form method="POST" action="{{ route('cocktails.destroy', $cocktail->id) }}" class="delete-form d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-delete">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- ventana modal para actualizar -->
@include('cocktails.modal')

<script>
    function formatActionModalForm(form, id) {
        const actionSplit = form.action.split("/");
        actionSplit.pop();
        form.action = actionSplit.join("/") + "/" + id;
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Script para cargar los datos del cóctel en el modal
        document.querySelectorAll('.btn-warning').forEach(button => {
            button.addEventListener('click', function() {
                const name = this.getAttribute('data-name');
                const category = this.getAttribute('data-category');
                const id = this.getAttribute('data-id');

                // Disparar mensaje en la consola para depurar
                console.log('Botón Editar clickeado para el cóctel con ID:', id);
                console.log('Nombre:', name);
                console.log('Categoría:', category);

                // Asignar los valores al modal
                const nameField = document.getElementById('cocktailName');
                const categoryField = document.getElementById('cocktailCategory');
                const idField = document.getElementById('cocktailId');
                const form = document.getElementById('editForm');

                if (id != null && id.length > 0) {
                    nameField.value = name;
                    categoryField.value = category;
                    idField.value = id;
                    formatActionModalForm(form, id);
                }
            });
        });
    });

    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('.delete-form');

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás deshacer esta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

@endsection