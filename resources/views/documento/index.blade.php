@extends('layouts.new-admin.master')
@section('css')  
@endsection
@section('page-header')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="# {{-- route('reporteInicial') --}}"><i
                            class="fe fe-home mr-2 fs-14"></i>{{ __('Home') }}</a></li>
                {{-- <li class="breadcrumb-item"><a href="{{ route('cupones-descuento.index') }}"><i
                            class="fe fe-file-plus mr-2 fs-14"></i>{{ __('Campañas') }}</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="#">
                        {{ __('Nueva Campaña') }}
                    </a>
                </li>
            </ol>
        </div>
    </div>
    <!--End Page header-->
@endsection
@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{ __('ESTADO TICKETS') }}</div>
                </div>
                <div class="card-body">
                 {{-- Desde aquí inicia el contenido --}}
                  <table class="table mt-5">
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th>Nombre</th>
                           <th>Tipo de documento</th>
                           <th>Categoria</th>
                           <th>Estado</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($documentos as $documento)
                        <tr>
                           <td scope="row">{{$documento->id}}</td>
                           <td>{{$documento->nombre}}</td>
                           <td>{{$documento->tipoDocumento->nombre}}</td>
                           <td>{{$documento->categoria_documento_id}}</td>
                           <td>{{$documento->estado->nombre}}</td>
                  
                           <td class="text-center">
                              <a href="{{ route('documento.edit', $documento) }}" class="btn btn-warning">
                                  <i class="fa fa-pencil">Editar</i>
                              </a>
                          </td>
                  
                        </tr>
                  
                        @endforeach
                  
                     </tbody>
                  </table>
                  <nav class="nav justify-content-center">
                     {{$documentos->appends(request()->query())->links()}}
                  </nav> 
                         
                </div>
            </div>
            <!--/div-->
        </div>
    </div>
    <!-- /Row -->
    </div>
    </div><!-- end app-content-->
    </div>
@endsection
@section('js')
 
@endsection