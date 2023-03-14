<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //var_dump($request);
        $busqueda = $request->buscar;
        $datos = DB::table('personas')
                ->select(   'personas.id',
                            'personas.nombre',
                            'personas.apellido',
                            'personas.tipoIdentificacion',
                            'personas.identificacion',
                            'personas.email',
                            'personas.pais',
                            'personas.direccion',
                            'personas.celular',
                            'personas.categoriaId',
                            'categorias.categoria'
                        )
                ->join  (   'categorias',
                            'categorias.id', '=', 'personas.categoriaId'
                        )
                ->where   ('personas.nombre','LIKE','%'. $busqueda . '%')
                ->paginate(5);



        //$datos["personas"]=Persona::paginate(5);
        return view('persona.index', ['personas' => $datos, 'busqueda'=>$busqueda]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = DB::table('categorias')->select('id','categoria')->get();
        return view('persona.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'nombre'=>'required|regex:/^[\pL\s\-]+$/u|string|min:5|max:100',
            'apellido'=>'required|regex:/^[\pL\s\-]+$/u|string|max:100',
            'tipoIdentificacion'=>'required',
            'identificacion'=>'required|numeric|unique:personas,identificacion',
            'email'=>'required|email|max:150|unique:personas,email',
            'pais'=>'required',
            'direccion'=>'required|max:180',
            'celular'=>'required|numeric|digits:10',
            'categoriaId'=>'required'
        ];

        //$mensaje=['required'=>'El :attribute es requerido'];

        $this->validate($request, $campos);
        //$datosPersona = request()->all();
        //var_dump($datosPersona);
        $datosPersona = request()->except('_token');
        Persona::insert($datosPersona);
        return redirect('persona')->with('mensaje','Persona agregada con éxito');
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
    public function edit($id)
    {
        $persona=Persona::findOrFail($id);
        $categorias = DB::table('categorias')->select('id','categoria')->get();
        return view('persona.edit', compact('persona','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombre'=>'required|regex:/^[\pL\s\-]+$/u|string|min:5|max:100',
            'apellido'=>'required|regex:/^[\pL\s\-]+$/u|string|max:100',
            'tipoIdentificacion'=>'required',
            'identificacion'=>'required|numeric|unique:personas,identificacion,'.$id,
            'email'=>'required|email|max:150|unique:personas,email,'.$id,
            'pais'=>'required',
            'direccion'=>'required|max:180',
            'celular'=>'required|numeric|digits:10',
            'categoriaId'=>'required'
        ];

        //$mensaje=['required'=>'El :attribute es requerido'];

        $this->validate($request, $campos);

        // SE RECEPCIONAN TODOS LOS DATOS
        $datosPersona = request()->except('_token','_method');
        Persona::where('id','=',$id)->update($datosPersona);
        $persona=Persona::findOrFail($id);
        //return view('persona.edit', compact('persona'));
        return redirect('persona')->with('mensaje','Persona modificada con éxito');
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
        return redirect('persona')->with('mensaje','Persona eliminado con éxito');
    }
}
