<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\models\TawkLog;
use App\models\TawkTicket;
use App\User;
use Illuminate\Http\Request;


class TawkController extends Controller
{
    protected $WEBHOOK_SECRET = '66d3d26fd1196bcb8fe5bf76356ce693d3aa4a4bf069320d3b02fd5b8013b6011f2b8e1144108f8d7261c9ecdb580961';

    public function ticketListener(Request $request)
    {
        // return $_SERVER;

        if (!$this->verifySignature(file_get_contents('php://input'), $_SERVER['HTTP_X_TAWK_SIGNATURE'])) {

            // verification failed
            return response()->json("Error");
        }

        // verification success
        else {

            //Obtención de datos del post de Tawk
            $datoRequester = json_decode(json_encode($request->requester));
            $datoTicket = json_decode(json_encode($request->ticket));
            $datoProperty = json_decode(json_encode($request->property));
            
            $mensaje = explode("\n", $datoTicket->message);
            $datoCorreoAgente = $mensaje[0];
            

            $user = User::where(['email' => $datoCorreoAgente])->get()->first();
            $tawkLog = new TawkLog();
            $tawkLog->log = $request;



            //Desustructuración y asignación a variables de BBDD
            $tawkTicket = new TawkTicket();
            $tawkTicket->tawk_id = $datoTicket->id;
            $tawkTicket->nombre = $datoProperty->name;
            $tawkTicket->asunto = $datoTicket->subject;
            $tawkTicket->mensaje = $datoTicket->message;
            $tawkTicket->fecha_ingreso = $request->time;
            $tawkTicket->correo_solicitante = $datoRequester->email;
            $tawkTicket->nombre_solicitante = $datoRequester->name;
            $tawkTicket->agente_solicitante_correo = $datoCorreoAgente;
            $tawkTicket->estado_ticket_id = 1;
            if ($user) $tawkTicket->agente_solicitante_id = $user->id;

            $tawkTicket->save();
            $tawkLog->save();

            return response()->json($tawkTicket);
        }
    }

    function verifySignature($body, $signature)
    {
        $digest = hash_hmac('sha1', $body, $this->WEBHOOK_SECRET);
        return $signature !== $digest;
    }
}
