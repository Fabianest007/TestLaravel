<?php

namespace App\Http\Controllers;

use App\models\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoDocumentoController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $request)
    {
        return Validator::make($request, [
            'nombre' => ['required'],
            'descripcion' => ['required'],
        ], [
            'nombre.required' => 'El nombre del tipo de documento es requerido',
            'descripcion.required' => 'la descripcion del tipo de documento es requerido',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $tipoDocumentos = TipoDocumento::nombre($request->nombre)->paginate(10);
        $listadoDocumentos = TipoDocumento::select('nombre')->get();
        // $tipoDocumentos = TipoDocumento::select('select * from tipo_documento where id = :id', ['id' => 1]);
        return view('tipoDocumento.index',[
            'tipoDocumentos' => $tipoDocumentos,
            'listadoDocumentos' => $listadoDocumentos
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoDocumento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $tipoDocumento = new TipoDocumento();
        $tipoDocumento->nombre = $request->nombre;
        $tipoDocumento->descripcion = $request->descripcion;

        try {
            if($tipoDocumento->save()){
                return redirect() -> route('tipoDocumento.index');
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDocumento $tipoDocumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoDocumento $tipoDocumento)
    {
        return view('tipoDocumento.edit',[
            'tipoDocumento' => $tipoDocumento
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoDocumento $tipoDocumento)
    {
        $this->validator($request->all())->validate();
        $tipoDocumento->nombre = $request->nombre;
        $tipoDocumento->descripcion = $request->descripcion;
        // $tipoDocumento->descripcion = NULL;

        try {
            if($tipoDocumento->update()){
                return redirect()->route('tipoDocumento.index');
            }
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            return view('error.error',[
                'message' => $message
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoDocumento $tipoDocumento)
    {
        //
    }
}
