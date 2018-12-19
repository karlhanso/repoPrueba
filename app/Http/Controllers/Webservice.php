<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Cache;
use SoapClient;
use DateTime;

class Webservice extends Controller
{ 
    private $url;
    private $transkey;
    private $login;
    

  /*  public function __construct()
    {
       $this->url      = env('urlwsl');
       $this->transkey = env('tranKey');
       $this->login    = env('login');
    }*/

    public function formPrincipal()
    {
        return view('formulario');
    }
 }