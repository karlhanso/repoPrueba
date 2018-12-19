<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
@php 
    $bancos = Cache::get("bancos");
@endphp

          </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
         
            <div class="content">
                <div class="title m-b-md">
                    {{ env('titulo')}}
                </div>

                 <select>

         @if(isset($bancos))
           @foreach( $bancos as $bq)
            <option value="{{$bq->bankCode}}">{{$bq->bankName}}</option>
           @endforeach
         @else
         <label>{{ env('lista_faltante') }}</label>
         @endif
         </select>

            </div>
        </div>
    </body>
</html>