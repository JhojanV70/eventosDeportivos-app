<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
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

    public function edit($id)
    {
        $equipo = Equipo::find($id);

        if (!$equipo) {
            return redirect()->route('equipos.index')->with('error', 'Equipo no encontrado.');
        }

        return view('equipos.edit', ['equipo' => $equipo]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'deporte' => 'required|string|max:255',
            'entrenador' => 'required|string|max:255',
        ]);

        $equipo = Equipo::find($id);
        $equipo->nombre = $request->nombre;
        $equipo->deporte = $request->deporte;
        $equipo->entrenador = $request->entrenador;
        $equipo->save();

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado con éxito.');
    }

    public function destroy($id)
    {
        $equipo = Equipo::find($id);

        if ($equipo->participacion) {
            return redirect()->route('equipos.index')->with('error', 'No se puede eliminar un equipo que tiene participaciones.');
        }

        $equipo->delete();
        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado con éxito.');
    }
}
