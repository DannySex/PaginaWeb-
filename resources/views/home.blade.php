@extends('layouts.app')

{{-- ESTILOS PERSONALIZADOS PARA ESTA VISTA --}}
@section('styles')
<style>
    /* Fondo degradado para la tarjeta principal */
    .welcome-card {
        background: linear-gradient(135deg,rgba(101, 255, 11, 0.83) 0%, #0072ff 100%);
        color: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(122, 240, 26, 0.84);
        padding: 2rem;
    }

    /* Títulos grandes */
    h1, h2 {
        font-weight: 700;
    }

    /* Botones redondeados con iconos */
    .btn-rounded {
        border-radius: 50px;
        padding: 10px 20px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    /* Secciones con sombra y espaciado */
    .feature-section {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 3px 12px rgba(255, 7, 7, 0.79);
        padding: 2rem;
        transition: transform 0.3s;
    }

    .feature-section:hover {
        transform: translateY(-5px);
    }

    /* Iconos SVG grandes */
    .feature-icon {
        font-size: 2rem;
        color:rgb(82, 208, 47);
    }
</style>
@endsection

{{-- CONTENIDO PRINCIPAL DE LA PÁGINA --}}
@section('content')
<div class="container py-5">

    {{-- BIENVENIDA CON ANIMACIÓN --}}
    <div class="welcome-card mb-5" data-aos="fade-up">
        <h1 class="mb-3">¡Hola {{ Auth::user()->name }}! 👋</h1>
        <p class="lead">Bienvenido al panel de control. Aquí puedes administrar tus películas, ver estadísticas y mucho más.</p>
    </div>

    {{-- SECCIONES DESTACADAS CON ANIMACIONES --}}
    <div class="row g-4">
        {{-- Sección 1 --}}
        <div class="col-md-4" data-aos="fade-right">
            <div class="feature-section text-center">
                <div class="feature-icon mb-3">🎬</div>
                <h4>Ver Películas</h4>
                <p>Explora tu catálogo de películas almacenadas.</p>
                <a href="{{ route('peliculas.index') }}" class="btn btn-outline-primary btn-rounded">
                    Ir al Catálogo
                </a>
            </div>
        </div>

        {{-- Sección 2 --}}
        <div class="col-md-4" data-aos="fade-up">
            <div class="feature-section text-center">
                <div class="feature-icon mb-3">➕</div>
                <h4>Agregar Película</h4>
                <p>Registra una nueva película a tu base de datos.</p>
                <a href="{{ route('peliculas.create') }}" class="btn btn-outline-success btn-rounded">
                    Añadir Nueva
                </a>
            </div>
        </div>

        {{-- Sección 3 --}}
        <div class="col-md-4" data-aos="fade-left">
            <div class="feature-section text-center">
                <div class="feature-icon mb-3">📊</div>
                <h4>Estadísticas</h4>
                <p>Próximamente: visualiza datos de tus películas favoritas.</p>
                <button class="btn btn-outline-secondary btn-rounded" disabled>
                    Proximanente    
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
