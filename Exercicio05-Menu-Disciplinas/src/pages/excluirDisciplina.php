<?php

$sigla = "";
$msg = "";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $sigla = $_GET['sigla'];

    // guardando o nome do arquivo
    $filename = "disciplina.txt";

    // verifica se o arquivo existe 
    if(!file_exists($filename)){
        echo "This file doesn't exists";
    }else{

        // criando arquivo temporário 
        $tempfile = "temp_disc_file.txt";
    
        $arqDisc = fopen($filename, "r") or die("Unable to open file!");
        $temp = fopen($tempfile, "w") or die("Unable to open file!");

        while(!feof($arqDisc)){

            $linha = fgets($arqDisc);
            
            // ignora linhas vazias
            if(trim($linha) == ""){
                continue;
            }

            // coloca cada dado(nome, sigla, carga) em um array
            $colunalinha = explode(";", $linha);

            // verifica se tem pelo menos duas colunas de dados(sigla e nome)
            if(count($colunalinha)>=2){
                // se a sigla não for igual a informada, escreve no arquivo temporário
                if(trim($colunalinha[1]) != $sigla){
                    fwrite($temp, $linha);
                }
            }            

        }

        fclose($temp);
        fclose($arqDisc);

        // Remove o arquivo original e renomeia o arquivo temporário
        if(unlink($filename) && rename($tempfile, $filename)){
            $msg = "Disciplinas atualizadas";
        }else{
            $msg = "Não foi possível renomear o arquivo";
        }        
    }

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <p><?php echo htmlspecialchars($msg); ?></p>
    <ul>
        <li><a href="listarDisciplina.php">Listar Disciplinas</a></li>
        <li><a href="../../index.html">Home</a></li>
    </ul>
</body>
</html>