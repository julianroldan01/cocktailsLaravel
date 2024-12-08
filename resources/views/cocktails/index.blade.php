@extends('layouts.app')

@section('content')
<div class="container-fluid bg-white" style="min-height: 100vh; padding-top: 20px; background-image: url('https://images.unsplash.com/photo-1570716893556-8cae2e541ba8?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="container py-4 bg-white shadow rounded" style="opacity: 0.95;">
        <h1 class="my-3 text-center fs-3 text-danger">Lista de Cócteles</h1>
        <div class="row g-4">
            @foreach($cocktails as $cocktail)
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $cocktail['strDrinkThumb'] }}" class="card-img-top rounded-top" alt="{{ $cocktail['strDrink'] }}" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-truncate text-danger">{{ $cocktail['strDrink'] }}</h5>
                                <p class="card-text text-muted ">{{ $cocktail['strCategory'] }}</p>
                                <form method="POST" action="{{ route('cocktails.store') }}" class="mt-auto">
                                    @csrf
                                    <input type="hidden" name="name" value="{{ $cocktail['strDrink'] }}">
                                    <input type="hidden" name="category" value="{{ $cocktail['strCategory'] }}">
                                    <input type="hidden" name="image" value="{{ $cocktail['strDrinkThumb'] }}">
                                    <div class="d-grid gap-2 col-3 ">
                                        <button class="btn btn-outline-success">Guardar</button>
                                    </div>
                                    @if (session('success'))
                                    <script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: '¡Éxito!',
                                            text: "{{ session('success') }}",
                                            timer: 3000,
                                            showConfirmButton: false
                                        });
                                    </script>
                                    @endif

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <br>
</div>
@endsection