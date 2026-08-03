<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::paginate(10);
        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        return view('horarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Dia' => 'required|string|max:10',
            'HorarioInicio' => 'required|date_format:H:i:s',
            'HorarioFin' => 'required|date_format:H:i:s|after:HorarioInicio',
            'Aula' => 'required|string|max:50',
        ]);

        Horario::create($request->all());
        return redirect()->route('horarios.index')->with('success', 'Horario creado exitosamente.');
    }

    public function show(Horario $horario)
    {
        return view('horarios.show', compact('horario'));
    }

    public function edit(Horario $horario)
    {
        return view('horarios.edit', compact('horario'));
    }

    public function update(Request $request, Horario $horario)
    {
        $request->validate([
            'Dia' => 'required|string|max:10',
            'HorarioInicio' => 'required|date_format:H:i:s',
            'HorarioFin' => 'required|date_format:H:i:s|after:HorarioInicio',
            'Aula' => 'required|string|max:50',
        ]);

        $horario->update($request->all());
        return redirect()->route('horarios.index')->with('success', 'Horario actualizado exitosamente.');
    }

    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('horarios.index')->with('success', 'Horario eliminado exitosamente.');
    }
}