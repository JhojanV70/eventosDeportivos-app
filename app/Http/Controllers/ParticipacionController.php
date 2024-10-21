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
        
        $request->validate([
            'evento_id' => 'required|exists:eventos,id', 
            'equipo_id' => 'required|exists:equipos,id', 
            'resultado' => 'required|string',
            'premios' => 'nullable|string',
        ]);

        
        $participacion = new Participacion();
        $participacion->evento_id = $request->input('evento_id');
        $participacion->equipo_id = $request->input('equipo_id');
        $participacion->resultado = $request->input('resultado');
        $participacion->premios = $request->input('premios');
        $participacion->save();

        
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

        
        $participacion->evento_id = $request->input('evento_id');
        $participacion->equipo_id = $request->input('equipo_id');
        $participacion->resultado = $request->input('resultado');
        $participacion->premios = $request->input('premios');

       
        $participacion->save();

        
        $participaciones = DB::table('participaciones')
        ->join('equipos', 'participaciones.equipo_id', '=', 'equipos.id')
        ->join('eventos', 'participaciones.evento_id', '=', 'eventos.id')
        ->select('participaciones.*', 'eventos.nombre as evento_nombre', 'equipos.nombre as equipo_nombre')
        ->get();
        
        return view('participaciones.index', ['participaciones' => $participaciones]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $participacion = Participacion::find($id);
        $participacion->delete();

        return redirect()->route('participaciones.index')->with('success', 'Participación eliminada con éxito.');
    }
}


