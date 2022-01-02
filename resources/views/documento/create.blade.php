@extends('layouts.layout')
@section('content')
    <h1>Crear un nuevo Documento</h1>
    <form action="{{ route('documento.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre"
                aria-describedby="helpId" placeholder="" value="{{ old('nombre') }}">
            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Tipo Documento</label>
                <select class="custom-select" name="tipoDocumento" id="tipoDocumento">
                    <option selected>Seleccionar ID</option>
                    @foreach ($tipoDocumentos as $tipoDocumento)
                    <option value="{{ $tipoDocumento->id }}">{{ $tipoDocumento->nombre }}</option>
                    @endforeach
                </select>
            @error('tipoDocumento')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Estado</label>
            <input type="text" class="form-control @error('estado') is-invalid @enderror" name="estado" id="estado"
                aria-describedby="helpId" placeholder="" value="{{ old('estado') }}">
            @error('estado')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <br>
        <button type="submit" name="" id="" class="btn btn-primary btn-lg btn-block">Enviar</button>
    </form>

@endsection
