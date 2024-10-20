<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = DB::table('equipos')
        ->select('equipos.*')
        ->get();
        return view('equipos.index', ['equipos' => $equipos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
        {
            return view('equipos.new');
        }

    public function store(Request $request)
        {
            $equipo = new Equipo();
            $equipo->nombre = $request->nombre; // Asegúrate de que el campo en el formulario se llame 'nombre'
            $equipo->deporte = $request->deporte; // Asegúrate de que el campo en el formulario se llame 'deporte'
            $equipo->entrenador = $request->entrenador; // Asegúrate de que el campo en el formulario se llame 'entrenador'
            $equipo->save();

            $equipos = DB::table('equipos')->get(); // Obtener todos los equipos
            return redirect()->route('equipos.index')->with('success', 'Equipo creado con éxito.'); // Cambia la vista a 'eventos.index'
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
