<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model {
    /**
    *  Asociacion de tabla con el modelo.
    *
    * @var string
    */
    protected $table = 'my_transaccions';
}