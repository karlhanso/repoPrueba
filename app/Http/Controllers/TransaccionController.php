<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaccion;
use Transacciones\Requests\CreateTransaccionRequest;
use Webservices\WebserviceTransaccion;
use Session;

class TransaccionController extends Controller {
    
    private $ws;

    public function __construct(WebserviceTransaccion $wstransaccion)
    {
        //$this->crearTransaccion = $transaccionRepository;
        $this->ws = $wstransaccion;
    }

    public function enviarRegistro(CreateTransaccionRequest $rq)
    {
        $respuesta = $this->ws->crearTransaccion($rq);
        $respuesta = $respuesta->createTransactionResult;
        // se guarda la creacion de la transaccion. Aprovisionamiento
        $resp                     = new  Transaccion;
        $resp->return_code        = $respuesta->returnCode;
        $resp->bankURL            = $respuesta->bankURL;
        $resp->trazabilityCode    = $respuesta->trazabilityCode;
        $resp->transactionCycle   = $respuesta->transactionCycle;
        $resp->transactionID      = $respuesta->transactionID;
        $resp->sessionID          = $respuesta->sessionID;
        $resp->bankFactor         = $respuesta->bankFactor;
        $resp->responseCode       = $respuesta->responseCode;
        $resp->responseReasonCode = $respuesta->responseReasonCode;
        $resp->responseReasonText = $respuesta->responseReasonText;
        $resp->save();
        
        Session::put('transactionID', $respuesta->transactionID);
        return redirect($respuesta->bankURL);
    }
}