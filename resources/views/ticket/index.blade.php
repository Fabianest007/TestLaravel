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
                    <a href="{{route('ticket.index')}}">
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
            <div class="row flex-lg-nowrap">
                <div class="col-12 mb-3">
                    <div class="e-panel card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('BUSCAR TICKET') }}</h3>
                        </div>
                        <div class="container pt-5">
                            <form action="{{ route('ticket.index') }}" method="get">
                                <div class="form-row">

                                    <div class="form-group col-md-1">
                                        <input type="text" name="id" id="id" class="form-control" placeholder="ID"
                                            value="">
                                    </div>

                                    <div class="form-group col-md-2 ">
                                        <select class="custom-select" name="estado" id="estado">
                                            <option value="">Estado</option>
                                            <option value="1">Pendiente</option>
                                            <option value="2">Asignado</option>
                                            <option value="3">Solucionado</option>
                                        </select>
                                    </div>

                                    {{-- <div class="form-group col-md-2">
                                        <input type="text" name="estado" id="estado" class="form-control" placeholder="Estado" aria-describedby="helpId" value="">
                                    </div> --}}

                                    <div class="form-group col-md-2">
                                        <input type="text" name="agenteSolicitante" id="agenteSolicitante"
                                            class="form-control" placeholder="Agente Solicitante" value="">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <select class="custom-select" name="usuarioAsignado" id="usuarioAsignado">
                                            <option value="">Usuario Asignado</option>
                                            @foreach ($listadoUsuarios as $usuario)
                                                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- <div class="form-group col-md-2">
                                        <input type="text" name="usuarioAsignado" id="usuarioAsignado"
                                            class="form-control" placeholder="Usuario Asignado" value="">
                                    </div> --}}

                                    <div class="form-group col-md-2">
                                        <input type="text" name="correoUsuario" id="correoUsuario"
                                            class="form-control" placeholder="Correo Usuario" value="">
                                    </div>

                                    <div class="form-group col-md-2">
                                      <input type="date" name="fecha" id="fecha" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>

                                    {{-- <div class="form-group col-md-4">
                                        <div class="form-group-prepend">
                                            <div class="form-group-text">
                                                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18"
                                                    viewBox="0 0 24 24" width="18">
                                                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                    <path
                                                        d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H4V5h16zM4 21V10h16v11H4z">
                                                    </path>
                                                    <path d="M4 5.01h16V8H4z" opacity=".3"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <input class="form-control fc-datepicker" placeholder="DD-MM-YYYY" type="date"
                                            name="fechaCreacion" id="fechaCreacion">
                                    </div> --}}

                                    <div class="form-group col-md-1">
                                        <button type="submit" class="btn btn-outline-success btn-block">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{ __('LISTADO TICKETS') }}</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-center">
                                <tr>
                                    <th class="wd-15p border-bottom-0 text-light">#</th>
                                    <th class="wd-15p border-bottom-0 text-light">CORREO USUARIO</th>
                                    <th class="wd-15p border-bottom-0 text-light">FECHA CREACIÓN</th>
                                    <th class="wd-20p border-bottom-0 text-light">ESTADO</th>
                                    <th class="wd-15p border-bottom-0 text-light">AGENTE SOLICITANTE</th>
                                    <th class="wd-15p border-bottom-0 text-light">USUARIO ASIGNADO</th>
                                    <th class="wd-25p border-bottom-0 text-light">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td class="text-center">{{ $ticket->id }}</td>
                                        <td class="text-center">{{ $ticket->correo_solicitante }}</td>
                                        <td class="text-center">{{ $ticket->created_at->format('d-m-y') }}</td>
                                        <td class="text-center">
                                            <div
                                                class="shadow p-3 mb-2 rounded font-weight-bold text-white text-center {{ $ticket->estadoTicket->clase }}">
                                                {{ $ticket->estadoTicket->estado }}
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $ticket->agenteSolicitante->name }}</td>
                                        <td class="text-center">
                                            @if ($ticket->usuarioAsignado != null)
                                                {{ $ticket->usuarioAsignado->name }}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-toolbar" role="toolbar">
                                                <div class="btn-group mr-2">
                                                    <a href="{{ route('ticket.edit', $ticket) }}"
                                                        class="btn btn-success" data-toggle="tooltip" title=""
                                                        data-original-title="Ver detalle ticket">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    &nbsp;
                                                    <a href="{{ route('ticket.index') }}"
                                                        class="btn btn-info" data-toggle="tooltip" title=""
                                                        data-original-title="Ver PDF">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <nav class="nav justify-content-center">
                        {{ $tickets->appends(request()->query())->links() }}
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
