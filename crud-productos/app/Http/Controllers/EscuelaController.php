<?php

namespace App\Http\Controllers;

use App\Models\Escuela;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Localidad;
use Illuminate\Http\Request;

class EscuelaController extends Controller
{
    public function index()
    {
        $escuelas = Escuela::with(['estado', 'municipio', 'localidad'])->paginate(10);
        return view('escuelas.index', compact('escuelas'));
    }

    public function create()
    {
        $estados = Estado::all();
        $municipios = Municipio::all();
        $localidades = Localidad::all();
        return view('escuelas.create', compact('estados', 'municipios', 'localidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'CCT' => 'required|string|size:10|unique:escuelas',
            'Nombre' => 'required|string|max:100',
            'Telefono' => 'required|string|size:10',
            'Email' => 'required|email|max:100',
            'Calle' => 'required|string|max:80',
            'NumE' => 'required|integer',
            'idLocalidad' => 'required|exists:localidades,idLocalidad',
            'idMunicipio' => 'required|exists:municipios,idMunicipio',
            'idEstado' => 'required|exists:estados,idEstado',
            'CP' => 'required|integer',
        ]);

        Escuela::create($request->all());
        return redirect()->route('escuelas.index')->with('success', 'Escuela creada exitosamente.');
    }

    public function show(Escuela $escuela)
    {
        $escuela->load(['estado', 'municipio', 'localidad']);
        return view('escuelas.show', compact('escuela'));
    }

    public function edit(Escuela $escuela)
    {
        $estados = Estado::all();
        $municipios = Municipio::all();
        $localidades = Localidad::all();
        return view('escuelas.edit', compact('escuela', 'estados', 'municipios', 'localidades'));
    }

    public function update(Request $request, Escuela $escuela)
    {
        $request->validate([
            'Nombre' => 'required|string|max:100',
            'Telefono' => 'required|string|size:10',
            'Email' => 'required|email|max:100',
            'Calle' => 'required|string|max:80',
            'NumE' => 'required|integer',
            'idLocalidad' => 'required|exists:localidades,idLocalidad',
            'idMunicipio' => 'required|exists:municipios,idMunicipio',
            'idEstado' => 'required|exists:estados,idEstado',
            'CP' => 'required|integer',
        ]);

        $escuela->update($request->all());
        return redirect()->route('escuelas.index')->with('success', 'Escuela actualizada exitosamente.');
    }

    public function destroy(Escuela $escuela)
    {
        $escuela->delete();
        return redirect()->route('escuelas.index')->with('success', 'Escuela eliminada exitosamente.');
    }
}