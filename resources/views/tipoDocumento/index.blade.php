@extends('layouts.layout')
@section('content')
<h1>Seleccion de tipo de Documento</h1>

<form class="form-inline" method="GET" action="{{route('tipoDocumento.index')}}">
   @csrf
   <div class="col-md-6 mb-6">
      <select class="custom-select" name="nombre" id="nombre">
         <option selected>Seleccionar ID</option>
            @foreach ($listadoDocumentos as $tipoDocumento)
            <option value="{{ $tipoDocumento->nombre }}">{{ $tipoDocumento->nombre }}</option>
            @endforeach
      </select>
   </div>
   <button type="submit" class="btn btn-primary mb-2">Submit</button>
 </form>

 <table class="table mt-5">
   <thead>
      <tr>
         <th>ID</th>
         <th>Nombre</th>
         <th>Descripción</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($tipoDocumentos as $tipoDocumento)
      {{-- {{$tipoDocumento->tipotipoDocumento}} --}}
      <tr>
         <td scope="row">{{$tipoDocumento->id}}</td>
         <td>{{$tipoDocumento->nombre}}</td>
         <td>{{$tipoDocumento->descripcion}}</td>

         <td class="text-center">
            <a href="{{ route('tipoDocumento.edit', $tipoDocumento) }}" class="btn btn-warning">
                <i class="fa fa-pencil">Editar</i>
            </a>
        </td>

      </tr>

      @endforeach
   </tbody>
</table>

 @endsection
