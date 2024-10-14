<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // recebendo o json enviado pelo JS
    $json = file_get_contents('php://input');
    $data = json_decode($json, true); // decodificando o JSON para um array associativo(com chave)

    // verificando se os dados foram entregues corretamente
    if(isset($data['pergunta']) 
    && isset($data['ID']) && isset($data['a']) 
    && isset($data['b']) && isset($data['c']) 
    && isset($data['d'])
    && isset($data['correta'])){

        $pergunta = $data['pergunta'];
        $id = $data['ID'];
        $altA = $data['a'];
        $altB = $data['b'];
        $altC = $data['c'];
        $altD = $data['d'];
        $altCrrt = $data['correta'];

        if(!file_exists("dadosPerguntas.txt")){
            $arqDisc = fopen("dadosPerguntas.txt", "w") or die("Erro ao abrir o arquivo");
            $linha = "ID;Pergunta;A;B;C;D;Alternativa Correta\n";
            fwrite($arqDisc, $linha);
            fclose($arqDisc);
        }

        $arqDisc = fopen("dadosPerguntas.txt", "a") or die("Erro ao abrir o arquivo");
        $linha = $id . ";" . $pergunta . ";" . $altA . ";" . $altB . ";" . $altC . ";" . $altD . ";" . $altCrrt . "\n";
        echo($linha);
        fwrite($arqDisc, $linha);
        fclose($arqDisc);

        echo "Pergunta registrada com sucesso!";

    }else{
        echo("Erro: Dados Incompletos");
    }
}