<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\models\TawkLog;
use Illuminate\Http\Request;

const WEBHOOK_SECRET = '66d3d26fd1196bcb8fe5bf76356ce693d3aa4a4bf069320d3b02fd5b8013b6011f2b8e1144108f8d7261c9ecdb580961';

function verifySignature($body, $signature)
{
    $digest = hash_hmac('sha1', $body, WEBHOOK_SECRET);

    return $signature !== $digest;
}

class TawkController extends Controller
{

    // public function ticketListener(Request $request)
    // {
    //     // return $_SERVER;

    //     if (!verifySignature(file_get_contents('php://input'), $_SERVER['HTTP_X_TAWK_SIGNATURE'])) {

    //         // verification failed
    //         return response()->json("Error");
    //     }

    //     // verification success
    //     else {

    //         $tawkLog = new TawkLog();
    //         $tawkLog->log = $request;
    //         $tawkLog->save();
    //         return response()->json(1);
    //     }
    // }
    public function ticketListener(Request $request)
    {
        $data = $request->time;
        $tawkLog = new TawkLog();
        $tawkLog->log = $data;
        $tawkLog->save();
        return response()->json(1);
    }
}
