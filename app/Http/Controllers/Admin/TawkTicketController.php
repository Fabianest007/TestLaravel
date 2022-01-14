<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SolucionTicketMail;
use App\Mail\TicketMail;
use App\models\EstadoTicket;
use App\models\MensajesTicket;
use App\models\RoleUser;
use App\models\TawkTicket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        //Muestra los roles que son distintos a los de los usuarios
        $roles = RoleUser::whereIn('role_id', [1, 5, 6])->get();
        return view("ticket.index", [
            "tickets" => $tickets,
            'roles' => $roles
        ]);
    }


    //Muestra los tickets asignados al usuario logueado
    public function asignados()
    {
        $user = Auth::user();
        $roles = RoleUser::whereIn('role_id', [1, 5, 6])->get();
        $tickets = TawkTicket::where(['usuario_asignado_id' => $user->id])->paginate(10);
        return view("ticket.index", [
            "tickets" => $tickets,
            'roles' => $roles,
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
        $roles = RoleUser::whereIn('role_id', [1, 5, 6])->get();
        $estados = EstadoTicket::all();
        $mensajes = MensajesTicket::where(['ticket_id' => $ticket->id])->orderBy('created_at', 'DESC')->get();
        return view('ticket.edit', [
            'ticket' => $ticket,
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
        //Si el ticket ya está solucionado, no se modifica el estado del ticket al asignar un usuario
        if ($ticket->estado_ticket_id != '3') {
            $ticket->estado_ticket_id = 2;
        }

        //Solo se enviará el correo si el usuario asignado cambió con respecto al anterior
        if ($ticket->usuario_asignado_id != $request->usuarioAsignado) {
            $ticket->usuario_asignado_id = $request->usuarioAsignado;
            try {
                if ($ticket->update()) {
                    Mail::to($ticket->usuarioAsignado->email)->send(new TicketMail($ticket));
                    return redirect()->route('ticket.edit', $ticket);
                }
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
        return redirect()->route('ticket.edit', $ticket);
    }

    public function updateMensaje(Request $request, TawkTicket $ticket)
    {
        $mensaje = new MensajesTicket();
        $mensaje->mensaje = $request->mensaje;
        $mensaje->ticket_id = $ticket->id;
        $mensaje->estado_ticket = $request->estadoTicket;
        $mensaje->usuario_id = Auth::user()->id;
        $ticket->estado_ticket_id = $request->estadoTicket;
        if ($ticket->estado_ticket_id == 3) {
            $ticket->fecha_solucion = date("Y-m-d H:i:s");
        }
 
        try {
            if ($mensaje->save()) {
                if ($ticket->update()) {

                    if ($ticket->estado_ticket_id == 3 && $request->enviarAlAgente){
                        Mail::to($ticket->agente_solicitante_correo)->send(new SolucionTicketMail($ticket, $mensaje));
                    }

                    if ($ticket->estado_ticket_id == 3 && $request->enviarAlUsuario){
                        Mail::to($ticket->correo_solicitante)->send(new SolucionTicketMail($ticket, $mensaje));
                    }
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
