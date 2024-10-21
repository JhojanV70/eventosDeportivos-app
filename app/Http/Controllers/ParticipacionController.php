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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
