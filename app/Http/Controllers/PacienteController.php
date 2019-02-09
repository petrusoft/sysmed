<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::paginate(10);
        return view('pacientes.index',compact('pacientes'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'dni_id' => 'required',
            'numero' => 'required',
            'nombre' => 'required',
            'telefono' => 'required',
            'imagen' => 'required|imagen',
        ]);

        // Paciente::create($request->all());

        $paciente = new Paciente();
        $paciente->codigo = $request->get('codigo');
        $paciente->dni_id = $request->get('dni_id');
        $paciente->numero = $request->get('numero');
        $paciente->nombre = $request->get('nombre');
        $paciente->telefono = $request->get('telefono');
        $paciente->imagen = $request->file('imagen')->get;
        $paciente->save();

        return redirect()->route('pacientes.index')->with('success', 'Paciente agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        $paciente = Paciente::findOrFail($paciente->id);
        return view('pacientes.show',compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        $paciente = Paciente::findOrFail($paciente->id);
        return view('pacientes.edit',compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'codigo' => 'required',
            'dni_id' => 'required',
            'numero' => 'required',
            'nombre' => 'required',
            'telefono' => 'required',
            'imagen' => 'required',
        ]);

        // $paciente->update($request->all());

        $paciente = Paciente::findOrFail($paciente->id);
        $paciente->codigo = $request->get('codigo');
        $paciente->dni_id = $request->get('dni_id');
        $paciente->numero = $request->get('numero');
        $paciente->nombre = $request->get('nombre');
        $paciente->telefono = $request->get('telefono');
        $paciente->imagen = $request->file('imagen')->get;
        $paciente->save();

        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        $paciente = Paciente::findOrFail($paciente->id);
        $paciente->delete();

        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado correctamente');
    }
}
