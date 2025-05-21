@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="text-primary">Películas</h1>
            <a href="{{ route('peliculas.create') }}" class="btn btn-success">
                Añadir nueva película
            </a>
        </div>

        @foreach ($peliculas as $pelicula)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $pelicula->titulo }} ({{ $pelicula->anio }})</h5>
                    <p class="card-text">{{ $pelicula->descripcion }}</p>
                    <p class="card-text"><strong>Género:</strong> {{ $pelicula->genero }}</p>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('peliculas.edit', $pelicula->id) }}" class="btn btn-primary btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('peliculas.destroy', $pelicula->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta película?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

