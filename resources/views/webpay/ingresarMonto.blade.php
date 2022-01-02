@extends('layouts.layout')
@section('content')
    <form action="{{route('webpay.inicioTransaccion')}}" method="POST">
       @csrf
       <div class="form-group">
         <label for="">Ingresar monto</label>
         <input type="number"
           class="form-control" name="monto" id="monto" aria-describedby="helpId" placeholder="">
       </div>
       <button type="submit" name="" id="" class="btn btn-primary btn-lg btn-block">Enviar</button>
    </form>
@endsection