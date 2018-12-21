<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;
use Webservices\WebservicesInicialBancos;

class llamarWS extends Command 
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'llamar:ws';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'llama al webservice';

    protected $name = 'llamar:ws';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        Log::debug(env('comando_msg')); 
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $WS = new WebservicesInicialBancos;
      $WS->obtenerListaDeBancos();
      Log::debug(env('msg_inicializar_ws'));
    }
}