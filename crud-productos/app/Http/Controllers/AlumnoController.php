<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\DatosPersonales;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::with(['carrera', 'datosPersonales'])->paginate(10);
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        $carreras = Carrera::where('Estatus', true)->get();
        $datosPersonales = DatosPersonales::all();
        return view('alumnos.create', compact('carreras', 'datosPersonales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Matricula' => 'required|string|size:20|unique:alumnos',
            'IdCarrera' => 'required|exists:carreras,IdCarrera',
            'IdDatosP' => 'required|exists:datos_personales,IdDatosP',
            'Status' => 'required|in:A,B,G',
        ]);

        Alumno::create($request->all());
        return redirect()->route('alumnos.index')->with('success', 'Alumno creado exitosamente.');
    }

    public function show(Alumno $alumno)
    {
        $alumno->load(['carrera', 'datosPersonales', 'asignaturas']);
        return view('alumnos.show', compact('alumno'));
    }

    public function edit(Alumno $alumno)
    {
        $carreras = Carrera::where('Estatus', true)->get();
        $datosPersonales = DatosPersonales::all();
        return view('alumnos.edit', compact('alumno', 'carreras', 'datosPersonales'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'IdCarrera' => 'required|exists:carreras,IdCarrera',
            'Status' => 'required|in:A,B,G',
        ]);

        $alumno->update($request->all());
        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado exitosamente.');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado exitosamente.');
    }
}