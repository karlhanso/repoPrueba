<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('titulo1')}}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style></style>
    @php $bancos = Cache::get("bancos"); @endphp
</head>
<body>
    <div class="container">
        <div class="title m-b-md">
            {{ env('titulo')}}
        </div>
        <div class="row"></div>
        <div class="row"></div>
        <div class="row"></div>
        <form class="col s12" action="registarTransaccion" method="post">
            <input type="hidden" name="_token" id="csrf-token" value=" {{ csrf_token() }}" />
            <div class="col s12"></div>
            <div class="input-field col s12">
                <select name="banca">
                    <option value="0">Seleccione tipo de banca</option>
                    <option value="1">Personal</option>
                </select>
                <label>Seleccione el tipo de banca</label>
            </div>

            <div class="input-field col s12">
                @if(isset($bancos))
                <select name="banco_select">
                    @foreach( $bancos as $bq)
                    <option value="{{$bq->bankCode}}">{{$bq->bankName}}</option>
                    @endforeach
                </select>
                @else
                <label>{{ env('lista_faltante') }}</label>
                @endif
                <label>Seleccione el tipo de banca</label>
            </div>
            <div class="row"></div>
            <div class="row">
                <label> Datos del comprador/Buyer</label>
            </div>
            <div class="row"></div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="" id="tipoDoc" name="tipoDoc" type="text" class="validate">
                    <label for="first_name">Tipo de documento</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="nDoc" name="nDoc" type="text" class="validate">
                    <label for="first_name">Numero de documento</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="nombre" name="nombre" type="text" class="validate">
                    <label for="first_name">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="apellidos" name="apellidos" type="text" class="validate">
                    <label for="first_name">Apellidos</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="nomEmpresa" name="nomEmpresa" type="text" class="validate">
                    <label for="first_name">Nombre de la empresa</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="email" name="mail" type="email" class="validate">
                    <label for="first_name">E-mail</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="direccion" name="direccion" type="text" class="validate">
                    <label for="first_name">Direccion</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="ciudad" name="ciudad" type="text" class="validate">
                    <label for="first_name">Ciudad</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="depto" name="depto" type="text" class="validate">
                    <label for="first_name">Departamento/provincia</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="pais" name="pais" type="text" class="validate">
                    <label for="first_name">Pais</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="telefono" name="telefono" type="text" class="validate">
                    <label for="first_name">Telefono</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="cel" name="cel" type="text" class="validate">
                    <label for="first_name">Celular</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="codpostal" name="codpostal" type="text" class="validate">
                    <label for="first_name">Codigo postal</label>
                </div>
                <div class="row"></div>
                <div class="row"></div>
                <div class="row">
                    <label> Datos del Pagador/Payer</label>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" type="text" class="validate" value="CC">
                        <label for="first_name">Tipo de documento</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" type="text" class="validate" value="757778">
                        <label for="first_name">Numero de documento</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" type="text" class="validate" value="carlos">
                        <label for="first_name">Nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" type="text" class="validate" value="perez rodriguez">
                        <label for="first_name">Apellidos</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" type="text" class="validate" value="no aplica">
                        <label for="first_name">Nombre de la empresa</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" type="text" class="validate" value="perez@prueba.com">
                        <label for="first_name">E-mail</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" type="text" class="validate" value="cra 20 a 30 - 50">
                        <label for="first_name">Direccion</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" type="text" class="validate" value="pereira">
                        <label for="first_name">Ciudad</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" type="text" class="validate" value="Risaralda">
                        <label for="first_name">Departamento/provincia</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" type="text" class="validate" value="Colombia">
                        <label for="first_name">Pais</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" type="text" class="validate" value="878787">
                        <label for="first_name">Telefono</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" type="text" class="validate" value="3562676">
                        <label for="first_name">Celular</label>
                    </div>
                </div>
            </div>
            <div class="row"></div>
            <div class="row"></div>
            <div class="row">
                <label> Datos de envio/Shipping</div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="" id="first_name" type="text" class="validate" value="CC">
                    <label for="first_name">Tipo de documento</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="first_name" type="text" class="validate" value="757778">
                    <label for="first_name">Numero de documento</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="first_name" type="text" class="validate" value="carlos">
                    <label for="first_name">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="first_name" type="text" class="validate" value="perez rodriguez">
                    <label for="first_name">Apellidos</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="first_name" type="text" class="validate" value="no aplica">
                    <label for="first_name">Nombre de la empresa</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="first_name" type="text" class="validate" value="perez@prueba.com">
                    <label for="first_name">E-mail</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="first_name" type="text" class="validate" value="cra 20 a 30 - 50">
                    <label for="first_name">Direccion</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="first_name" type="text" class="validate" value="pereira">
                    <label for="first_name">Ciudad</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="first_name" type="text" class="validate" value="Risaralda">
                    <label for="first_name">Departamento/provincia</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="first_name" type="text" class="validate" value="Colombia">
                    <label for="first_name">Pais</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="first_name" type="text" class="validate" value="878787">
                    <label for="first_name">Telefono</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="first_name" type="text" class="validate" value="3562676">
                    <label for="first_name">Celular</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="" id="first_name" type="text" class="validate" name="canttot" value="50000">
                    <label for="first_name">Cantidad total</label>
                </div>
                <div class="row"></div>
                <div class="row"></div>
                <div class="row"></div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                    <i class="material-icons right"></i>
                </button>
            </div>
        </form>
        <div class="row">
            <div class="col s12">
                <label for="first_name">Registro</label>
                <table>
                    <thead>
                        <tr>
                            <th>Id transaccion</th>
                            <th>Session ID</th>
                            <th>Request date</th>
                            <th>Bank Process Date</th>
                            <th>Return Code</th>
                            <th>Trazability code</th>
                            <th>Transaction state</th>
                            <th>Response Reason Text</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tabla as $tb)
                      <tr>
                        <td>{{$tb->transactionID}}</td>
                        <td>{{$tb->sessionID}}</td>
                        <td>{{$tb->requestDate}}</td>
                        <td>{{$tb->bankProcessDate}}</td>
                        <td>{{$tb->returnCode}}</td>
                        <td>{{$tb->trazabilityCode}}</td>
                        <td>{{$tb->transactionState}}</td>
                        <td>{{$tb->responseReasonText}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select').formSelect();
        });
    </script>
</body>
</html>