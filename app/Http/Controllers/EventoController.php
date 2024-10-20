<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        return view('eventos.index', ['eventos' => $eventos]);
    }

    public function create()
    {
        return view('eventos.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'ubicacion' => 'required|string|max:255',
            'tipo' => 'required|in:torneo,partido amistoso,maratón',
        ]);

        $evento = new Evento();
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->fecha = $request->fecha;
        $evento->ubicacion = $request->ubicacion;
        $evento->tipo = $request->tipo;
        $evento->save();

        return redirect()->route('eventos.index')->with('success', 'Evento creado con éxito.');
    }

    public function edit($id)
    {
        $evento = Evento::find($id);

        if (!$evento) {
            return redirect()->route('eventos.index')->with('error', 'Evento no encontrado.');
        }

        return view('eventos.edit', ['evento' => $evento]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'ubicacion' => 'required|string|max:255',
            'tipo' => 'required|in:torneo,partido amistoso,maratón',
        ]);

        $evento = Evento::find($id);
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->fecha = $request->fecha;
        $evento->ubicacion = $request->ubicacion;
        $evento->tipo = $request->tipo;
        $evento->save();

        return redirect()->route('eventos.index')->with('success', 'Evento actualizado con éxito.');
    }

    public function destroy($id)
    {
        $evento = Evento::find($id);
        $evento->delete();

        return redirect()->route('eventos.index')->with('success', 'Evento eliminado con éxito.');
    }
}
