<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::paginate(5);

        return view('persona.index')
        ->with('personas',$personas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persona.form');
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
            'nombre'=>'required|max:25',
            'apellido'=>'required|max:25',
            'usuario'=>'required|max:25',
            'password'=>'required|max:25',
            'idRol'=>'required',
        ]);

        $profile = Persona::create($request->only('nombre','apellido','usuario','password','2'));

        Session::flash('mensaje', 'Usuario creado con exito!');
        return redirect()->route('persona.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        return view('persona.form')
        ->with('persona', $persona);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        
        $request->validate([
            'nombre'=>'required|max:25',
            'apellido'=>'required|max:25',
            'usuario'=>'required|max:25',
            'password'=>'required|max:25',
            
        ]);

        $persona-> nombre = $request['nombre'];
        $persona-> apellido = $request['apellido'];
        $persona-> usuario = $request['usuario'];
        $persona-> password = $request['password'];
        $persona->save();

        Session::flash('mensaje', 'Usuario Editado con exito!');
        return redirect()->route('persona.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();
        Session::flash('mensaje', 'Usuario eliminado con exito!');
        return redirect()->route('persona.index');
    }
}
