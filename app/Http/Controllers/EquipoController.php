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
        $equipos = Equipo::all();
        return view('equipos.index', ['equipos' => $equipos]);
    }

    public function create()
    {
        return view('equipos.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'deporte' => 'required|string|max:255',
            'entrenador' => 'required|string|max:255',
        ]);

        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->deporte = $request->deporte;
        $equipo->entrenador = $request->entrenador;
        $equipo->save();

        return redirect()->route('equipos.index')->with('success', 'Equipo creado con éxito.');
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
    public function destroy($id)
    {
        $equipo = Equipo::find($id);
        $equipo->delete();

        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado con éxito.');
    }
}


