@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h3>Editar Película</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('peliculas.update', $pelicula->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input 
                            type="text" 
                            name="titulo" 
                            id="titulo" 
                            value="{{ $pelicula->titulo }}" 
                            class="form-control" 
                            required 
                            placeholder="Ingrese el título de la película"
                        >
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea 
                            name="descripcion" 
                            id="descripcion" 
                            class="form-control" 
                            placeholder="Ingrese una descripción"
                        >{{ $pelicula->descripcion }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="genero" class="form-label">Género:</label>
                        <input 
                            type="text" 
                            name="genero" 
                            id="genero" 
                            value="{{ $pelicula->genero }}" 
                            class="form-control" 
                            placeholder="Ingrese el género"
                        >
                    </div>

                    <div class="mb-3">
                        <label for="anio" class="form-label">Año:</label>
                        <input 
                            type="number" 
                            name="anio" 
                            id="anio" 
                            value="{{ $pelicula->anio }}" 
                            class="form-control" 
                            placeholder="Ingrese el año de lanzamiento"
                        >
                    </div>

                    <div class="text-end">
                        <button 
                            type="submit" 
                            class="btn btn-primary"
                        >
                            Actualizar
                        </button>
                        <a href="{{ route('peliculas.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
