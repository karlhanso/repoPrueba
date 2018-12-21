<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Transaccion;
use App\Compra;
use Webservices\WebserviceTransaccion;
use Cache;  
use SoapClient;
use DateTime;
use Session;    

class Webservice extends Controller 
{ 
    private $url;
    private $transkey;
    private $login;
    

    public function __construct(WebserviceTransaccion $wstransaccion)
    {
        $this->ws = $wstransaccion;
    }

    public function formPrincipal()  
    {   
        if (Session::get('transactionID')) {
            $idtransaccion = Session::get('transactionID');
            $resp          = $this->ws->getInfoTransaccion($idtransaccion);
            $resp          = $resp->getTransactionInformationResult;

            $cp                     = new Compra;
            $cp->transactionID      = $resp->transactionID;
            $cp->sessionID          = $resp->sessionID;
            $cp->requestDate        = $resp->requestDate;
            $cp->bankProcessDate    = $resp->bankProcessDate;
            $cp->returnCode         = $resp->returnCode;
            $cp->trazabilityCode    = $resp->trazabilityCode;
            $cp->transactionState   = $resp->transactionState;
            $cp->responseReasonText = $resp->responseReasonText;
            $cp->save();
            session()->forget('transactionID');
            session()->flush();
        }
        $registros =  Compra::all();
        return view('formulario')->with('tabla', $registros);
    }
 }