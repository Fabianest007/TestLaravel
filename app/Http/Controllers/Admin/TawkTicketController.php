<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\EstadoTicket;
use App\models\MensajesTicket;
use App\models\RoleUser;
use App\models\TawkTicket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TawkTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tickets = TawkTicket::id($request->id)
            ->usuarioAsignado($request->usuarioAsignado)
            ->correoUsuario($request->correoUsuario)
            ->agente($request->agenteSolicitante)
            ->estado($request->estado)
            ->paginate(10);

        // return $request;

        $listadoUsuarios = User::get();
        return view("ticket.index", [
            "tickets" => $tickets,
            'listadoUsuarios' => $listadoUsuarios
        ]);
    }

    // public function pendientes()
    // {
    //     $tickets = TawkTicket::where(['estado_ticket_id' => 1])->paginate(10);
    //     return view("ticket.index", [
    //         "tickets" => $tickets,
    //         "titulo" => "TICKETS PENDIENTES"
    //     ]);
    // }

    public function asignados()
    {
        $user = Auth::user();
        $listadoUsuarios = User::get();
        $tickets = TawkTicket::where(['usuario_asignado_id' => $user->id])->paginate(10);
        return view("ticket.index", [
            "tickets" => $tickets,
            'listadoUsuarios' => $listadoUsuarios,
            "titulo" => "TICKETS ASIGNADOS A MI"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TawkTicket $ticket)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(/*TawkTicket $ticket*/$id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TawkTicket $ticket)
    {
        // $listadoUsuarios = User::whereNotIn(['rol' != 'user']);
        $roles = RoleUser::whereIn('role_id',[1,2])->get();
    // return $roles;
        $estados = EstadoTicket::all();
        $mensajes = MensajesTicket::where(['ticket_id' => $ticket->id])->orderBy('created_at', 'DESC')->get();
        $listadoUsuarios = User::get();
        return view('ticket.edit', [
            'ticket' => $ticket,
            'listadoUsuarios' => $listadoUsuarios,
            'mensajes' => $mensajes,
            'estados' => $estados,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TawkTicket $ticket)
    {
        $ticket->usuario_asignado_id = $request->usuarioAsignado;
        if ($ticket->estado_ticket_id != '3'){
            $ticket->estado_ticket_id = 2;
        }

        
        //Hacer que se le envíe un correo al usuario asignado
        try {
            if ($ticket->update()) {
                return redirect()->route('ticket.edit', $ticket);
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updateMensaje(Request $request, TawkTicket $ticket)
    {
        $mensaje = new MensajesTicket();
        $mensaje->mensaje = $request->mensaje;
        $mensaje->ticket_id = $ticket->id;
        $mensaje->estado_ticket = $request->estadoTicket;
        $mensaje->usuario_id = Auth::user()->id;
        $ticket->estado_ticket_id = $request->estadoTicket;
        if($ticket->estado_ticket_id == 3){
            $ticket->fecha_solucion = date("Y-m-d H:i:s");
        }
        // return $ticket;

        try {
            if ($mensaje->save()) {
                if ($ticket->update()) {
                    return redirect()->route('ticket.edit', $ticket);
                }
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
