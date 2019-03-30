<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Dni;
use Image;

use Illuminate\Http\Request;
use App\Http\Requests\PacienteRequest;

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
        return view('pacientes.index', compact('pacientes'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dnis = Dni::all();
        return view('pacientes.create', compact('dnis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacienteRequest $request)
    {
        //Paciente::create($request->all());
        $paciente = new Paciente();
        $paciente->codigo = $request->get('codigo');
        $paciente->dni_id = $request->get('dni_id');
        $paciente->numero = $request->get('numero');
        $paciente->nombre = $request->get('nombre');
        $paciente->telefono = $request->get('telefono');
        $paciente->created_by = gethostname().'\\'.get_current_user().'\\'.auth()->user()->name;
        $paciente->save();
        // Redimencionar y guardar imagen
        if ($request->hasFile('imagen')) {
            $path = 'storage\\uploads\\images\\pacientes\\'.$paciente->id.'.jpg';
            Image::make($request->file('imagen'))->resize(150, null, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save(public_path($path));
            $paciente->imagen = $path;
            $paciente->save();
        }

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
        return view('pacientes.show', compact('paciente'));
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
        $dnis = Dni::all();
        return view('pacientes.edit',compact('paciente', 'dnis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(PacienteRequest $request, Paciente $paciente)
    {
        //$paciente->update($request->all());
        $paciente = Paciente::findOrFail($paciente->id);
        $paciente->codigo = $request->get('codigo');
        $paciente->dni_id = $request->get('dni_id');
        $paciente->numero = $request->get('numero');
        $paciente->nombre = $request->get('nombre');
        $paciente->telefono = $request->get('telefono');
        $paciente->updated_by = gethostname().'\\'.get_current_user().'\\'.auth()->user()->name;
        // Redimencionar y actualizar imagen
        if ($request->hasFile('imagen')) {
            $path = 'storage\\uploads\\images\\pacientes\\'.$paciente->id.'.jpg';
            Image::make($request->file('imagen'))->resize(150, null, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save(public_path($path));
            $paciente->imagen = $path;
            $paciente->save();
        }
        // Eliminar imagen
        if ($request->get('eliminar')) {
            if (file_exists(public_path($paciente->imagen))) {
                unlink(public_path($paciente->imagen));
                $paciente->imagen = '';
            }
        }

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
