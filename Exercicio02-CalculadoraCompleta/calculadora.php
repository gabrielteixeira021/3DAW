<?php

$op = $_GET["op"];

$v1 = $_GET["a"];
$v2 = $_GET["b"];
$result = 0;

switch($op){
    case "1": // soma
        $result = $v1 + $v2;
        break;
    case "2": // subtração
        $result = $v1 - $v2;
        break;
    case "3"; // multiplicação
        $result = $v1 * $v2;
        break;
    case "4"; // divisão
        $result = $v1 / $v2;
        break;
    case "5": // raiz quadrada
        $result = sqrt((float) $v1);
        break;
    case "6": // troca de sinais
        $result = ($v1<0) ? abs($v1) : $v1 * (-1);        
        break;
    case "7"; // seno
        $result = sin($v1);
        break;
    case "8": // cosseno
        $result = cos($v1);
        break;
    case "9": // tangente
        $result = tan($v1);
        break;
    default:
        echo "Insira uma operação válida";
        break;
}

echo "<h1>Resultado: $result</h1>";