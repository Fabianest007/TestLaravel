@extends('layouts.layout')
@section('content')
<h1>Listado de estados</h1>
<table class="table mt-5">
   <thead>
      <tr>
         <th>ID</th>
         <th>Nombre</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($estados as $estado)
      {{-- {{$estado->tipoestado}} --}}
      <tr>
         <td scope="row">{{$estado->id}}</td>
         <td>{{$estado->nombre}}</td>
         <td class="text-center">
            <a href="{{ route('estado.edit', $estado) }}" class="btn btn-warning">
                <i class="fa fa-pencil">Editar</i>
            </a>
        </td>

      </tr>

      @endforeach

   </tbody>
</table>
<nav class="nav justify-content-center">
   {{$estados->appends(request()->query())->links()}}
</nav>
@endsection