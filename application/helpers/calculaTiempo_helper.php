<?php
function diferenciaFechas($fechaSolicitud = ""){
    timezones('UM6');
    $fechaInicio = new DateTime($fechaSolicitud);
    $fechaActual = new DateTime(date('Y-m-d H:i:s'));
    $diferencia = $fechaInicio->diff($fechaActual);
    $annos = floor($diferencia->y);
    $meses = floor($diferencia->m);
    $dias = floor($diferencia->d);
    $horas = floor($diferencia->h);
    $minutos = floor(($horas*60*60)/ 60);
    $segundos = floor(($horas*60*60 - $minutos*60));
    $resultado = "";
    if($annos > 0){
        $resultado .= $annos." A";
    }
    if($meses > 0 && $annos==0){
        $resultado .= $meses." M";
    }
    if($dias > 0 && $meses == 0){
        $resultado .= $dias." D";
    }
    if($horas > 0 && $dias==0){
        $resultado .= $horas." H";
    }
    if($minutos > 0 && $horas == 0){
        $resultado .= $minutos." M";
    }
    if($segundos > 0 && $minutos == 0){
        $resultado .= $segundos." S";
    }
    return $resultado;
}
