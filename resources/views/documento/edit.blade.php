@extends('layouts.layout')
@section('content')
    <h1>Editar el documento: {{ $documento->nombre }}</h1>
    <form action="{{ route('documento.update', $documento) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre"
                aria-describedby="helpId" placeholder="" value="{{ old('nombre', $documento->nombre) }}">
            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Tipo Documento</label>
            <input type="text" class="form-control @error('tipoDocumento') is-invalid @enderror" name="tipoDocumento"
                id="tipoDocumento" aria-describedby="helpId" placeholder="" value="{{ old('tipoDocumento', $documento->tipo_documento_id) }}">
            @error('tipoDocumento')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Estado</label>
            <input type="text" class="form-control @error('estado') is-invalid @enderror" name="estado" id="estado"
                aria-describedby="helpId" placeholder="" value="{{ old('estado', $documento->estado_id) }}">
            @error('estado')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <br>
        <button type="submit" name="" id="" class="btn btn-primary btn-lg btn-block">Enviar</button>
    </form>
    <br>
    <a name="" id="" class="btn btn-primary" href="{{ route('documento.index') }}" role="button">Atras</a>

@endsection