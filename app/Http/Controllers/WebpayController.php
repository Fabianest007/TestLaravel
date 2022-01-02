<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus;

use Transbank\Webpay\WebpayPlus\Transaction;

class WebpayController extends Controller
{

    public function getTransaccion(){
        return view('webpay.ingresarMonto');
    }

    public function inicioTransaccion(Request $request){
        WebpayPlus::configureForTesting();
        // $transaction = new Transaction();
        $transaction = new Transaction();

        $buyOrder = 'ordenCompraTest';
        $sessionId = '196434372';
        $amount = $request->monto;
        $returnUrl = 'http://www.comercio.cl/webpay/retorno';



        $responce = $transaction->create($buyOrder, $sessionId, $amount, $returnUrl);
        $url =$responce->getUrl();
        $token = $responce->getToken();

        return view('webpay.pagar', [
            "url" => $url,
            "token" => $token
        ]);
    }
}
