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
        return redirect()->route('eventos.index')->with('success', 'Evento creado con éxito.'); // Cambia la vista a 'eventos.index'
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
    public function edit($id)

    {
        // Busca el evento por ID
        $evento = Evento::find($id);
    
        // Verifica si el evento existe
        if (!$evento) {
            return redirect()->route('eventos.index')->with('error', 'Evento no encontrado.');
        }
    
        return view('eventos.edit', ['evento' => $evento]);
    }
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'fecha' => 'required|date',
        'ubicacion' => 'required|string|max:255',
        'tipo' => 'required|in:torneo,partido amistoso,maratón', // Tipos válidos
    ]);

    $evento = Evento::find($id);

    $evento->nombre = $request->nombre;
    $evento->descripcion = $request->descripcion;
    $evento->fecha = $request->fecha;
    $evento->ubicacion = $request->ubicacion;
    $evento->tipo = $request->tipo;
    $evento->save();

    $eventos = DB::table('eventos')->get(); // Ajuste para obtener la tabla 'eventos'
    return redirect()->route('eventos.index')->with('success', 'Evento actualizado con éxito.'); // Redirigir a la vista index
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)

    {
        $eventos = Evento::find($id);
        $eventos->delete();
        
        $eventos = DB::table('eventos')->select('id', 'nombre', 'descripcion', 'fecha', 'ubicacion', 'tipo')->get();
        return view('eventos.index', ['eventos' => $eventos]);
    }
    

    
}
