<?php
namespace Webservices;


use Illuminate\Support\Facades\Log;
use Cache;
use SoapClient;
use DateTime;

class WebservicesInicialBancos {

    private $url;
    private $transkey;
    private $login;
    
    public function __construct()
    {
       $this->url      = env('urlwsl');
       $this->transkey = env('tranKey');
       $this->login    = env('login');
    }

    public function obtenerListaDeBancos()
    {
        $client  = new SoapClient($this->url);
        $date    = new DateTime();
        $seed    = date(env('formato'));
  
        $hashString = sha1($seed.$this->transkey, false);

        $data = [
            'login'   => $this->login,
            'tranKey' => $hashString,
            'seed'    => $seed,
        ];

        $data2 = [
            'auth' => $data  
        ];

        $res = $client->__soapCall(env('getbancos'),array($data2));
           
        Cache::put('bancos', $res->getBankListResult->item, env('diario'));
        Log::debug(env('msg_ws'));      
    }

}