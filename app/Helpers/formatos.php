<?php
    function formatoFechaMesCompleto($fecha, $separador)
    {
        $arreglo_fecha = explode(" ", $fecha);
        $arreglo_fecha = explode("-", $arreglo_fecha[0]);

        $mes  = "";
        $dia  = $arreglo_fecha[2];
        $anio = $arreglo_fecha[0];

        if ($arreglo_fecha[1] == "01") $mes = "Enero";
        if ($arreglo_fecha[1] == "02") $mes = "Febrero";
        if ($arreglo_fecha[1] == "03") $mes = "Marzo";
        if ($arreglo_fecha[1] == "04") $mes = "Abril";
        if ($arreglo_fecha[1] == "05") $mes = "Mayo";
        if ($arreglo_fecha[1] == "06") $mes = "Junio";
        if ($arreglo_fecha[1] == "07") $mes = "Julio";
        if ($arreglo_fecha[1] == "08") $mes = "Agosto";
        if ($arreglo_fecha[1] == "09") $mes = "Septiembre";
        if ($arreglo_fecha[1] == "10") $mes = "Octubre";
        if ($arreglo_fecha[1] == "11") $mes = "Noviembre";
        if ($arreglo_fecha[1] == "12") $mes = "Diciembre";

        return $dia . $separador . $mes . $separador . $anio;
    }

    function limpiarString($caracteres, $sustituir, $cadena)
    {
        foreach ($caracteres as $caracter) {

            $cadena = str_replace($caracter, $sustituir, $cadena);

        }

        return $cadena;
    }
?>