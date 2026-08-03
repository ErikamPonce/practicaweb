<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\TipoPersonal;
use App\Models\DatosPersonales;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $personal = Personal::with(['tipo', 'datosPersonales'])->paginate(10);
        return view('personal.index', compact('personal'));
    }

    public function create()
    {
        $tipos = TipoPersonal::all();
        $datosPersonales = DatosPersonales::all();
        return view('personal.create', compact('tipos', 'datosPersonales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'IdDatosP' => 'required|exists:datos_personales,IdDatosP',
            'IdTipo' => 'required|exists:tipos_personal,idTipo',
            'ClaveEmp' => 'required|string|size:10|unique:personal',
            'Status' => 'required|boolean',
        ]);

        Personal::create($request->all());
        return redirect()->route('personal.index')->with('success', 'Personal creado exitosamente.');
    }

    public function show(Personal $personal)
    {
        $personal->load(['tipo', 'datosPersonales', 'horarios']);
        return view('personal.show', compact('personal'));
    }

    public function edit(Personal $personal)
    {
        $tipos = TipoPersonal::all();
        $datosPersonales = DatosPersonales::all();
        return view('personal.edit', compact('personal', 'tipos', 'datosPersonales'));
    }

    public function update(Request $request, Personal $personal)
    {
        $request->validate([
            'IdTipo' => 'required|exists:tipos_personal,idTipo',
            'Status' => 'required|boolean',
        ]);

        $personal->update($request->all());
        return redirect()->route('personal.index')->with('success', 'Personal actualizado exitosamente.');
    }

    public function destroy(Personal $personal)
    {
        $personal->delete();
        return redirect()->route('personal.index')->with('success', 'Personal eliminado exitosamente.');
    }
}