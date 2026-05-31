@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-primary">🎬 Películas</h1>

    <a href="{{ route('peliculas.create') }}"
       class="btn btn-success">
        Añadir película
    </a>
</div>

@foreach ($peliculas as $pelicula)
    <div class="card mb-4 shadow">

        <div class="card-body">

            @if($pelicula->imagen)
                <div class="text-center mb-3">
                    <img src="{{ asset('imagenes/' . $pelicula->imagen) }}"
                         alt="{{ $pelicula->titulo }}"
                         class="img-fluid rounded"
                         style="max-width:300px;">
                </div>
            @endif

            <h4 class="card-title">
                {{ $pelicula->titulo }}
                <small class="text-muted">
                    ({{ $pelicula->anio }})
                </small>
            </h4>

            <p class="card-text">
                {{ $pelicula->descripcion }}
            </p>

            <p>
                <strong>Género:</strong>
                {{ $pelicula->genero }}
            </p>

            <div class="d-flex gap-2">
                <a href="{{ route('peliculas.edit', $pelicula->id) }}"
                   class="btn btn-primary">
                    Editar
                </a>

                <form action="{{ route('peliculas.destroy', $pelicula->id) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger">
                        Eliminar
                    </button>
                </form>
            </div>

        </div>
    </div>
@endforeach

@endsection