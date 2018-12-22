<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Cache;
use SoapClient;
use DateTime;

class WebservicesinstubTest extends TestCase
{

    public function testObtenerBancos()
    {
        $url        = env('urlwsl');
        $transkey   = env('tranKey');
        $login      = env('login');
        $client     = new SoapClient($url);
        $date       = new DateTime();
        $seed       = date(env('formato'));
        $hashString = sha1($seed.$transkey, env('parametroFalso'));

        $data = [
            'login'   => $login,
            'tranKey' => $hashString,
            'seed'    => $seed,
        ];

        $data2 = [
            'auth' => $data,  
        ];


        $res = $client->__soapCall(env('getbancos'),array($data2));
        $res = $res->getBankListResult->item;

        $this->assertEquals(env('unionCodigo'),$res[env('unionIndice')]->bankCode);
        $this->assertEquals(env('unionNombre'),$res[env('unionIndice')]->bankName);
    }

   public function testsCrearAprovisionamiento()
   {
       $url        = env('urlwsl');
       $transkey   = env('tranKey');
       $login      = env('login');
       $client     = new SoapClient($url);
       $date       = new DateTime();
       $seed       = date(env('formato'));
       $hashString = sha1($seed.$transkey, env('parametroFalso'));

       $payer = [
           'documentType' => env('aprovisionarTipodocumento'),
           'document'     => env('aprovisionarNdocumento'),
           'firstName'    => env('aprovisionarNombre'),
           'lastName'     => env('aprovisionarApellido'),
           'company'      => env('aprovisionarEmpresa'),
           'emailAddress' => env('aprovisionarEmail'),
           'address'      => env('aprovisonarDireccion'),
           'city'         => env('aprovisionarCiudad'),
           'province'     => env('aprovisionarDepto'),
           'country'      => env('aprovisionarPais'),
           'phone'        => env('aprovisionarTelefono'),
           'mobile'       => env('aprovisionarCelular'),
           'postalCode'   => env('aprovisionarCodigoPostal'),
        ];

       $buyer    = $payer;
       $shipping = $buyer;

       $transaccion = [
            'bankCode'      => env('aprovisionarCodigoBanco'),
            'bankInterface' => env('aprovisionarCodigoInterfaz'),
            'returnURL'     => env('aprovisonarUrlRetorno'),
            'reference'     => env('aprovisionarReferencia'),
            'description'   => env('aprovisionarDescripcion'),
            'language'      => env('aprovisionarISOlenguaje'),
            'currency'      => env('aprovisionarISOmoneda'),
            'totalAmount'   => env('aprovisionarCantidadTotal'),
            'taxAmount'     => env('aprovisionarTaxAmount'),
            'devolutionBase'=> env('aprovisionarBaseDevolucion'),
            'tipAmount'     => env('aprovisionarCantidadPropina'),
            'payer'         => $payer,
            'buyer'         => $buyer,
            'shipping'      => $shipping,
            'ipAddress'     => env('aprovisionarIP'),
            'userAgent'     => env('aprovisionarAgente'),
        ];

        $data = [
            'login'   => $login,
            'tranKey' => $hashString,
            'seed'    => $seed,
        ];

        $params = array('auth' => $data,'transaction' => $transaccion);
       
        $res = $client->__soapCall(env('crearTransac'),array($params));
        $res = $res->createTransactionResult;
        
        $this->assertEquals(env('aprovisionarReturnCode'),$res->returnCode);
        $this->assertEquals(env('aprovisionarISOmoneda'),$res->bankCurrency);
   }

   public function testObtenerInfoTransaccion()
   {   
       $url        = env('urlwsl');
       $transkey   = env('tranKey');
       $login      = env('login');
       $client     = new SoapClient($url);
       $date       = new DateTime();
       $seed       = date(env('formato'));
       $hashString = sha1($seed.$transkey, env('parametroFalso'));

       $payer = [
           'documentType' => env('aprovisionarTipodocumento'),
           'document'     => env('aprovisionarNdocumento'),
           'firstName'    => env('aprovisionarNombre'),
           'lastName'     => env('aprovisionarApellido'),
           'company'      => env('aprovisionarEmpresa'),
           'emailAddress' => env('aprovisionarEmail'),
           'address'      => env('aprovisonarDireccion'),
           'city'         => env('aprovisionarCiudad'),
           'province'     => env('aprovisionarDepto'),
           'country'      => env('aprovisionarPais'),
           'phone'        => env('aprovisionarTelefono'),
           'mobile'       => env('aprovisionarCelular'),
           'postalCode'   => env('aprovisionarCodigoPostal'),
       ];

       $buyer    = $payer;
       $shipping = $buyer;

       $transaccion = [
           'bankCode'      => env('aprovisionarCodigoBanco'),
           'bankInterface' => env('aprovisionarCodigoInterfaz'),
           'returnURL'     => env('aprovisonarUrlRetorno'),
           'reference'     => env('aprovisionarReferencia'),
           'description'   => env('aprovisionarDescripcion'),
           'language'      => env('aprovisionarISOlenguaje'),
           'currency'      => env('aprovisionarISOmoneda'),
           'totalAmount'   => env('aprovisionarCantidadTotal'),
           'taxAmount'     => env('aprovisionarTaxAmount'),
           'devolutionBase'=> env('aprovisionarBaseDevolucion'),
           'tipAmount'     => env('aprovisionarCantidadPropina'),
           'payer'         => $payer,
           'buyer'         => $buyer,
           'shipping'      => $shipping,
           'ipAddress'     => env('aprovisionarIP'),
           'userAgent'     => env('aprovisionarAgente'),
       ];

       $data = [
           'login'   => $login,
           'tranKey' => $hashString,
           'seed'    => $seed,
       ];

       $params = array('auth' => $data,'transaction' => $transaccion);
       $res    = $client->__soapCall(env('crearTransac'),array($params));
       $res    = $res->createTransactionResult;

       $idtransaccion = $res->transactionID;
       $params        = array('auth' => $data,'transactionID' => $idtransaccion);
       $response      = $client->__soapCall(env('info_transsaccion'),array($params));
       $response      = $response->getTransactionInformationResult;

       $this->assertEquals($idtransaccion,$response->transactionID);
       $this->assertEquals(env('infoReturnCode'),$response->returnCode);
       $this->assertEquals(env('infoTransactionState'),$response->transactionState);
   }
}