@extends('layouts.layout')
@section('content')
<h1>Listado de Documentos</h1>
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
      {{-- {{$documento->tipoDocumento}} --}}
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
@endsection