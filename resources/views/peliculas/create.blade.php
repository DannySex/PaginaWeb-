@extends('layout')

@section('content')
    <h1>Añadir Película</h1>

    <form action="{{ route('peliculas.store') }}" method="POST">
        @csrf
 <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" >
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Género</label>
            <input type="text" name="genero" id="genero" class="form-control">
        </div>

        <div class="mb-3">
            <label for="anio" class="form-label">Año</label>
            <input type="number" name="anio" id="anio" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection