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
                    <a href="{{ route('ticket.index') }}">
                        {{ __('Tickets') }}
                    </a>
                </li>
            </ol>
        </div>
    </div>
    <!--End Page header-->
@endsection
@section('content')
    <!-- Row -->
    <div class="row flex-lg-nowrap">
        <div class="col-12">
            <div class="e-panel card">
                <div class="card-header">
                    <h3 class="card-title">INFORMACIÓN DEL TICKET #{{ $ticket->id }}</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('ticket.update', $ticket) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-sm-4 col-xl-4">
                                <label class="text-ms">Ticket creado por</label>
                                <input type="text" name="agenteSolicitante" id="agenteSolicitante" class="form-control"
                                    value="{{ $ticket->agenteSolicitante->name }}" readonly="" />
                            </div>
                            <div class="form-group col-sm-4 col-xl-4">
                                <label class="text-ms">Nombre usuario solicitante</label>
                                <input type="text" name="nombreSolicitante" id="nombreSolicitante" class="form-control"
                                    value="{{ $ticket->nombre_solicitante }}" readonly="" />
                            </div>
                            <div class="form-group col-sm-4 col-xl-4">
                                <label class="text-ms">Correo usuario solicitante</label>
                                <input type="text" name="correoSolicitante" id="correoSolicitante" class="form-control"
                                    value="{{ $ticket->correo_solicitante }}" readonly="" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-4 col-xl-4">
                                <label class="text-ms">Fecha de ingreso</label>
                                <input type="datetime" name="fechaIngreso" id="fechaIngreso" class="form-control"
                                    value="{{ $ticket->created_at->format('d-m-y') }}" readonly="" />
                            </div>
                            <div class="form-group col-sm-4 col-xl-4">
                                <label class="text-ms">Fecha de solución</label>
                                <input type="datetime" name="fechaSolucion" id="fechaSolucion" class="form-control"
                                    value="{{ $ticket->fecha_solucion }}" readonly="" />
                            </div>

                            <div class="col-sm-4 col-xl-4 ">
                                <label class="text-ms">Usuario asignado</label>
                                <select class="custom-select" name="usuarioAsignado" id="usuarioAsignado">
                                    <option value="">Asignar Usuario</option>
                                    {{-- Dejar If dentro del ciclo para ver si el usuario asignado es igual a alguno de la lista --}}
                                    {{-- @if ($ticket->usuario_asignado_id)                                                                  
                                        <option value='{{ $ticket->usuarioAsignado->id }}'selected="">{{ $ticket->usuarioAsignado->name }}</option>
                                    @endif --}}
                                    @foreach ($listadoUsuarios as $usuario)
                                        @if ($ticket->usuario_asignado_id == $usuario->id)
                                            <option value='{{ $ticket->usuarioAsignado->id }}' selected>
                                                {{ $ticket->usuarioAsignado->name }}</option>
                                        @else
                                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            {{-- <div class="form-group col-sm-4 col-xl-4">
                                <label class="text-ms">Usuario asignado</label>
                                <input type="text" name="amount" id="amount" class="form-control" value="
                                                @if ($ticket->usuarioAsignado != null)
                                {{ $ticket->usuarioAsignado->name }}
                                @endif"
                                readonly="" />
                            </div> --}}
                        </div>

                        <div class="form-row">
                            <div class="form-group col-xl-8">
                                <label class="text-ms">Asunto</label>
                                <input type="text" name="asunto" id="asunto" class="form-control"
                                    value="{{ $ticket->asunto }}" readonly="" />
                            </div>


                            {{-- <div class="form-group col-sm-4 col-xl-4">
                                <label class="text-ms">Tawk ID</label>
                                <input type="text" name="tawkID" id="tawkID" class="form-control"
                                    value="{{ $ticket->tawk_id }}" readonly="" />
                            </div> --}}

                            <div class="form-group col-xl-4">
                                <label class="text-ms">Estado del ticket</label>
                                <input type="text" name="estadoTicket" id="estadoTicket"
                                    class="form-control text-white {{ $ticket->estadoTicket->clase }}"
                                    value="{{ $ticket->estadoTicket->estado }}" readonly="" />
                            </div>
                            <div class="form-group col-xl-8">
                                <label for="">Mensaje</label>
                                <textarea class="form-control text-dark" name="mensaje" id="mensaje" rows="5"
                                    readonly="">{{ $ticket->mensaje }}</textarea>
                            </div>

                            <div class="align-self-end col-xl-4">
                                <button type="submit" class="ml-2 btn btn-outline-success">Asignar Usuario</button>
                            </div>
                        </div>
                    </form>

                    <hr>

                    <h3 class="card-title">MENSAJES</h3>

                    <div id="btns" class="row">
                        <div class="col-sm-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <b>Nuevo mensaje</b>
                                </div>
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="form-group col-8">
                                                <textarea class="form-control text-dark" placeholder="Escriba su mensaje" name="mensaje" id="mensaje" rows="5"></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-xl-12">
                                                    <label class="text-ms">Modificar estado del ticket</label>
                                                    <input type="text" name="estadoTicket" id="estadoTicket"
                                                        class="form-control text-white {{ $ticket->estadoTicket->clase }}"
                                                        value="{{ $ticket->estadoTicket->estado }}" readonly="" />
                                                </div>
                                                <div class="col-xl-12">
                                                    <button type="submit" class="ml-2 btn btn-outline-success">Enviar</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="btns" class="row">
                        <div class="col-sm-4">
                            
                            @foreach ($mensajes as $mensaje)
                            <p>{{$mensaje->mensaje}}</p>
                            @endforeach
                            <div class="card mb-3">
                                <div class="card-header">
                                    <b>Mensaje 1 de 2</b>
                                </div>
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="row">
                                            <h5 class="col-sm-6">Gonzalo Soto</h5>
                                            <h5 class="col-sm-6">16-12-2021</h5>
                                            <div class="form-group col-xl-12">
                                                <textarea class="form-control text-dark" name="mensaje" id="mensaje"
                                                    rows="5" readonly="">{{ $ticket->mensaje }}</textarea>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <b>Mensaje 2 de 2</b>
                                </div>
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="row">
                                            <h5 class="col-sm-6">Jorge Araya</h5>
                                            <h5 class="col-sm-6">20-12-2021</h5>
                                            <div class="form-group col-xl-12">
                                                <textarea class="form-control text-dark" name="mensaje" id="mensaje"
                                                    rows="5" readonly="">{{ $ticket->mensaje }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div><!-- end app-content-->
    </div>
@endsection
@section('js')

@endsection
