<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = DB::table('eventos')
        ->select('eventos.*')
        ->get();
        return view('eventos.index', ['eventos' => $eventos]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          
        return view('eventos.new');
    }
    
    /**
     * Almacena un evento en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación para asegurarse de que el tipo sea válido
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'ubicacion' => 'required|string|max:255',
            'tipo' => 'required|in:torneo,partido amistoso,maratón', // Tipos válidos
        ]);
    
        // Creación del evento
        $evento = new Evento();
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->fecha = $request->fecha;
        $evento->ubicacion = $request->ubicacion;
        $evento->tipo = $request->tipo;
        $evento->save();
    
        // Recuperar todos los eventos y mostrarlos en la vista index
        $eventos = DB::table('eventos')->get(); // Ajuste para obtener la tabla 'eventos'
        return view('eventos.index', ['eventos' => $eventos]); // Cambia la vista a 'eventos.index'
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
