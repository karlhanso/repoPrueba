<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery as m;
use SoapClient;
use DateTime;

class WebserviceTest extends TestCase 
{  
    
    public function testGetBancos()
    {
        $item           =  new \stdClass();
        $item->bankCode = env('codigoBanco');
        $item->bankName = env('bancoNombre');

        $respuesta                    = new  \stdClass();
        $getBankListResult            = new  \stdClass();
        $getBankListResult->item      = $item;
        $respuesta->getBankListResult = $getBankListResult;
         
        $clientstub = $this->getMockFromWsdl(env('urlwsl'),env('getbancos')); 
        $clientstub->expects($this->any())
            ->method(env('getbancos'))
            ->will($this->returnValue($respuesta));

        $this->assertEquals($respuesta,$clientstub->getBankList(env('numero_ws'))); 
    }

    public function testAprovicionarTransaccion()
    {
        $respuesta                  = new  \stdClass(); 
        $createTransactionResult    = new  \stdClass();

        $createTransactionResult->returnCode         = env('codigoRetorno');
        $createTransactionResult->bankURL            = env('dirBanco');
        $createTransactionResult->trazabilityCode    = env('codigotrazabilidad');
        $createTransactionResult->transactionCycle   = env('cicloTransaccion');
        $createTransactionResult->transactionID      = env('idTransaccion');
        $createTransactionResult->sessionID          = env('idSession');
        $createTransactionResult->bankCurrency       = env('monedaISO');
        $createTransactionResult->bankFactor         = env('tipoBanca');
        $createTransactionResult->responseCode       = env('codigoRespuesta');
        $createTransactionResult->responseReasonCode = env('codigoRespuestaRazon');
        $createTransactionResult->responseReasonText = env('textoRazon');
        
        $respuesta->createTransactionResult = $createTransactionResult; 

        $clientstub = $this->getMockFromWsdl(env('urlwsl'),env('crearTransac'));
        $clientstub->expects($this->any())
            ->method(env('crearTransac'))
            ->will($this->returnValue($respuesta));

        $this->assertEquals($respuesta,$clientstub->createTransaction(env('numero_ws')));   
    }

    public function testObtenerInformacionTransaccion()
    {
        $respuesta                   = new  \stdClass();
        $TransactionInformationResul = new  \stdClass();

        $TransactionInformationResul->transactionID      = env('idtransaccionInfo');
        $TransactionInformationResul->sessionID          = env('idSeccionInfo');
        $TransactionInformationResul->reference          = env('referenciaInfo');
        $TransactionInformationResul->requestDate        = env('fechaRequest');
        $TransactionInformationResul->bankProcessDate    = env('procesamientoDate');
        $TransactionInformationResul->onTest             = env('ontestInfo');
        $TransactionInformationResul->returnCode         = env('codigoRetornoInfo');
        $TransactionInformationResul->trazabilityCode    = env('codigoTrazabilidadInfo');
        $TransactionInformationResul->transactionCycle   = env('cicloTransaccionInfo');
        $TransactionInformationResul->transactionState   = env('estadoTransaccionInfo');
        $TransactionInformationResul->responseCode       = env('codigoRespuestaInfo');
        $TransactionInformationResul->responseReasonCode = env('codigoRazonInfo');
        $TransactionInformationResul->responseReasonText = env('respuestaRazonTexto');

        $clientstub = $this->getMockFromWsdl(env('urlwsl'),env('informacionTransaccion'));
        $clientstub->expects($this->any())
            ->method(env('informacionTransaccion'))
            ->will($this->returnValue($respuesta));
        $this->assertEquals($respuesta,$clientstub->getTransactionInformation(env('numero_ws')));   
    }
}