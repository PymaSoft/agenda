<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth',['only'=>'create']);
    }

    public function index(Request $request)
    {
        // $nombre = $request->get('buscarpor');
        // dd($nombre);
        // $apellido = $request->get('buscarporapellido');
        // $Agenda = Agenda::where('nombres','like',"%$nombre%")->paginate(5);
        // $Agenda = Agenda::nombre($nombre)->apellidos($apellido)->paginate(5);

        // return view('agenda.index', compact('Agenda'));

        // $Agenda = Agenda::all();
        // $Agenda = Agenda::paginate(5);
        // dd($Agenda);

        // return view('agenda.index', compact('Agenda'));
        $buscar = $request->get('buscarpor');

        $tipo = $request->get('tipo');

        $Agenda = Agenda::buscarpor($tipo, $buscar)->paginate(5);
        
        return view('agenda.index', compact('Agenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Agenda = new Agenda();
        $Agenda->nombres = $request->nombres;
        $Agenda->apellidos = $request->apellidos;
        $Agenda->telefono = $request->telefono;
        $Agenda->celular = $request->celular;
        $Agenda->sexo = $request->sexo;
        $Agenda->email = $request->email;
        $Agenda->posicion = $request->posicion;
        $Agenda->departamento = $request->departamento;
        $Agenda->salario = $request->salario;
        $Agenda->fechadenacimiento = $request->fechadenacimiento;
        $Agenda->save();
        // return 'Registro guardado correctamente!';
        return redirect()->route('agenda.index')->with('datos','Registro guardeado correctamente');
        // return dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Agenda= Agenda::findOrFail($id);
        return view('agenda.show', compact('Agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $Agenda= Agenda::findOrFail($id);
        return view('agenda.edit', compact('Agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        // dd($request);
        $Agenda= Agenda::findOrFail($id);
        $Agenda->nombres = $request->nombres;
        $Agenda->apellidos = $request->apellidos;
        $Agenda->telefono = $request->telefono;
        $Agenda->celular = $request->celular;
        $Agenda->sexo = $request->sexo;
        $Agenda->email = $request->email;
        $Agenda->posicion = $request->posicion;
        $Agenda->departamento = $request->departamento;
        $Agenda->salario = $request->salario;
        $Agenda->fechadenacimiento = $request->fechadenacimiento;
        $Agenda->save();
        return redirect()->route('agenda.index')->with('datos','Registro actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Agenda = Agenda::findOrFail($id);
        $Agenda->delete();
        return redirect()->route('agenda.index')->with('datos','Registro Eliminado correctamente');
    }

    public function confirm($id)
    {
        $Agenda = Agenda::findOrFail($id);
        return view('agenda.confirm', compact('Agenda'));
    }
}
