<?php

namespace Webservices;

use Illuminate\Support\Facades\Log;
use Cache;
use SoapClient;
use DateTime;

class WebServiceTransaccion 
{
    private $url;
    private $transkey;
    private $login;

    public function __construct()
    {
        $this->url      = env('urlwsl');
        $this->transkey = env('tranKey');
        $this->login    = env('login');
    }

    public function crearTransaccion($rq)
    {
        $client  = new SoapClient($this->url);
        $date    = new DateTime();
        $seed    = date(env('formato'));
  
        $hashString = sha1($seed.$this->transkey, false);

        $payer = [
            'documentType' => $rq->get('tipoDoc'),
            'document'     => $rq->get('nDoc'),
            'firstName'    => $rq->get('nombre'),
            'lastName'     => $rq->get('apellidos'),
            'company'      => $rq->get('nomEmpresa'),
            'emailAddress' => $rq->get('mail'),
            'address'      => $rq->get('direccion'),
            'city'         => $rq->get('ciudad'),
            'province'     => $rq->get('depto'),
            'country'      => $rq->get('pais'),
            'phone'        => $rq->get('telefono'),
            'mobile'       => $rq->get('cel'),
            'postalCode'   => $rq->get('codpostal'),
        ];

        $buyer = [
            'documentType' => $rq->get('tipoDoc'),
            'document'     => $rq->get('nDoc'),
            'firstName'    => $rq->get('nombre'),
            'lastName'     => $rq->get('apellidos'),
            'company'      => $rq->get('nomEmpresa'),
            'emailAddress' => $rq->get('mail'),
            'address'      => $rq->get('direccion'),
            'city'         => $rq->get('ciudad'),
            'province'     => $rq->get('depto'),
            'country'      => $rq->get('pais'),
            'phone'        => $rq->get('telefono'),
            'mobile'       => $rq->get('cel'),
            'postalCode'   => $rq->get('codpostal'),
        ];

        $shipping = [
            'documentType' => $rq->get('tipoDoc'),
            'document'     => $rq->get('nDoc'),
            'firstName'    => $rq->get('nombre'),
            'lastName'     => $rq->get('apellidos'),
            'company'      => $rq->get('nomEmpresa'),
            'emailAddress' => $rq->get('mail'),
            'address'      => $rq->get('direccion'),
            'city'         => $rq->get('ciudad'),
            'province'     => $rq->get('depto'),
            'country'      => $rq->get('pais'),
            'phone'        => $rq->get('telefono'),
            'mobile'       => $rq->get('cel'),
            'postalCode'   => $rq->get('codpostal'),
        ];

        $transaccion = [
            'bankCode'      => $rq->get('banco_select'),
            'bankInterface' => $rq->get('banca'),
            'returnURL'     => env('urldeRetorno'),
            'reference'     => env('reference'),
            'description'   => env('descripcion'),
            'language'      => env('lenguajeISO'),
            'currency'      => env('monedaISO'),
            'totalAmount'   => $rq->get('canttot'),
            'taxAmount'     => env('taxAmount'),
            'devolutionBase'=> env('devolutionbase'),
            'tipAmount'     => env('tipamount'),
            'payer'         => $payer,
            'buyer'         => $buyer,
            'shipping'      => $shipping,
            'ipAddress'     => $rq->ip(),
            'userAgent'     => $rq->header('User-Agent'),
        ];

        $data = [
            'login'   => $this->login,
            'tranKey' => $hashString,
            'seed'    => $seed,
        ];
    
        $params = array('auth' => $data,'transaction' => $transaccion);
       
        $res = $client->__soapCall(env('crearTransac'),array($params));
        
        return $res;
    }

    public function getInfoTransaccion($id)
    {
        $client     = new SoapClient($this->url);
        $date       = new DateTime();
        $seed       = date(env('formato'));
        $hashString = sha1($seed.$this->transkey, false);

        $data = [
            'login'   => $this->login,
            'tranKey' => $hashString,
            'seed'    => $seed,
        ];

        $params = array('auth' => $data,'transactionID' => $id);

        $res = $client->__soapCall(env('info_transsaccion'),array($params));
        return $res;
    }
}