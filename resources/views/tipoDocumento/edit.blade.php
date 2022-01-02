@extends('layouts.layout')
@section('content')

<h1>Editar el tipo de documento: {{ $tipoDocumento -> nombre }}</h1>
<form action="{{ route('tipoDocumento.update', $tipoDocumento) }}" method="POST">
   @csrf
   @method('PUT')
   <div class="form-group">
       <label for="">Nombre</label>
       <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre"
           aria-describedby="helpId" placeholder="" value="{{ old('nombre', $tipoDocumento->nombre) }}">
       @error('nombre')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
       @enderror
   </div>
   <div class="form-group">
       <label for="">descripción</label>
       <input type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
           id="descripcion" aria-describedby="helpId" placeholder="" value="{{ old('descripcion', $tipoDocumento->descripcion) }}">
       @error('descripcion')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
       @enderror
   </div>

   <br>
   <button type="submit" name="" id="" class="btn btn-primary btn-lg btn-block">Enviar</button>
</form>



@endsection