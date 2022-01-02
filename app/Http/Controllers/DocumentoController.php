<?php

namespace App\Http\Controllers;

use App\models\Documento;
use App\models\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $request)
    {
        return Validator::make($request, [
            // 'nombre' => ['required', \Illuminate\Validation\Rule::unique('nacionalidads')->ignore($id)], //validador 
            'nombre' => ['required'],
            'estado' => ['required'],
            'tipoDocumento' => ['required']
        ], [
            'nombre.required' => 'El nombre del documento es requerido',
            'estado.required' => 'El estado del documento es requerido',
            'tipoDocumento.required' => 'El tipo del documento es requerido'
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $documentos = Documento::paginate(10);
        return view("documento.index",[
            "documentos" => $documentos
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoDocumentos = TipoDocumento::all();
        return view("documento.create", [
            'tipoDocumentos' => $tipoDocumentos
        ]);
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
        $documento = new Documento();
        $documento->nombre = $request->nombre;
        $documento->tipo_documento_id = $request->tipoDocumento;
        $documento->estado_id = $request->estado;
        $documento->categoria_documento_id = 2;
        $documento->tipo_firma_id = 2;
        $documento->minimo_firmas = 2;
        $documento->created_user_id = 1; 

        try {
            if ($documento->save()){
                return redirect() -> route('documento.index')->with('flash','Documento creado exitosamente');
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit(Documento $documento)
    {
        return view('documento.edit',[
            'documento' => $documento
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documento $documento)
    {
        $this->validator($request->all())->validate();
        $documento->nombre = $request->nombre;
        $documento->tipo_documento_id = $request->tipoDocumento;
        $documento->estado_id = $request->estado;
        $documento->categoria_documento_id = 2;
        $documento->tipo_firma_id = 2;
        $documento->minimo_firmas = 2;
        $documento->created_user_id = 1;

        try {
            if($documento->update()){
                return redirect()->route('documento.index');
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        //
    }
}
