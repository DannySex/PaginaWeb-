<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index()
    {
        $peliculas = Pelicula::all();
        return view('peliculas.index', compact('peliculas'));
    }

    public function create()
    {
        return view('peliculas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
        ]);

        $datos = $request->only([
            'titulo',
            'descripcion',
            'genero',
            'anio'
        ]);

        if ($request->hasFile('imagen')) {

            $archivo = $request->file('imagen');

            $nombre = time() . '.' . $archivo->getClientOriginalExtension();

            $archivo->move(public_path('imagenes'), $nombre);

            $datos['imagen'] = $nombre;
        }

        Pelicula::create($datos);

        return redirect()
            ->route('peliculas.index')
            ->with('success', 'Película agregada correctamente.');
    }

    public function edit(Pelicula $pelicula)
    {
        return view('peliculas.edit', compact('pelicula'));
    }

    public function update(Request $request, Pelicula $pelicula)
    {
        $request->validate([
            'titulo' => 'required',
        ]);

        $datos = $request->only([
            'titulo',
            'descripcion',
            'genero',
            'anio'
        ]);

        if ($request->hasFile('imagen')) {

            $archivo = $request->file('imagen');

            $nombre = time() . '.' . $archivo->getClientOriginalExtension();

            $archivo->move(public_path('imagenes'), $nombre);

            $datos['imagen'] = $nombre;
        }

        $pelicula->update($datos);

        return redirect()
            ->route('peliculas.index')
            ->with('success', 'Película actualizada.');
    }

    public function destroy(Pelicula $pelicula)
    {
        $pelicula->delete();

        return redirect()
            ->route('peliculas.index')
            ->with('success', 'Película eliminada.');
    }
}