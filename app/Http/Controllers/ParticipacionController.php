<?php

namespace App\Http\Controllers;

use App\Models\Participacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participaciones = DB::table('participaciones')
        ->join('equipos', 'participaciones.equipo_id', '=', 'equipos.id')
        ->join('eventos', 'participaciones.evento_id', '=', 'eventos.id')
        ->select('participaciones.*', 'eventos.nombre as evento_nombre', 'equipos.nombre as equipo_nombre')
        ->get();    
        return view('participaciones.index', ['participaciones' => $participaciones]);
    
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $eventos = DB::table('eventos')
        ->orderBy('nombre')
        ->get();
        $equipos = DB::table('equipos')
        ->orderBy('nombre')
        ->get();
        return view('participaciones.new', ['eventos' => $eventos, 'equipos' => $equipos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'evento_id' => 'required|exists:eventos,id', // Asegúrate de que el evento exista
            'equipo_id' => 'required|exists:equipos,id', // Asegúrate de que el equipo exista
            'resultado' => 'required|string',
            'premios' => 'nullable|string',
        ]);

        // Crear una nueva participación
        $participacion = new Participacion();
        $participacion->evento_id = $request->input('evento_id');
        $participacion->equipo_id = $request->input('equipo_id');
        $participacion->resultado = $request->input('resultado');
        $participacion->premios = $request->input('premios');
        $participacion->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('participaciones.index')->with('success', 'Participación creada exitosamente.');
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
        $participacion = Participacion::find($id);    
        $eventos = DB::table('eventos')
        ->orderBy('nombre')
        ->get();
        $equipos = DB::table('equipos')
        ->orderBy('nombre')
        ->get();

        return view('participaciones.edit', ['participacion' => $participacion, 'eventos' => $eventos, 'equipos' => $equipos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $participacion = Participacion::find($id);

        // Actualizar los datos de la participación
        $participacion->evento_id = $request->input('evento_id');
        $participacion->equipo_id = $request->input('equipo_id');
        $participacion->resultado = $request->input('resultado');
        $participacion->premios = $request->input('premios');

        // Guardar la actualización en la base de datos
        $participacion->save();

        // Obtener todas las participaciones junto con los datos de eventos y equipos
        $participaciones = DB::table('participaciones')
        ->join('equipos', 'participaciones.equipo_id', '=', 'equipos.id')
        ->join('eventos', 'participaciones.evento_id', '=', 'eventos.id')
        ->select('participaciones.*', 'eventos.nombre as evento_nombre', 'equipos.nombre as equipo_nombre')
        ->get();
        // Devolver la vista de índice con todas las participaciones
        return view('participaciones.index', ['participaciones' => $participaciones]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
