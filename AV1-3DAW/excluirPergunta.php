<?php

$msg = "";
$ID = "";

if($_SERVER['REQUEST_METHOD']=='GET'){

    $nome_arquivo = "perguntas_e_respostas.txt";

    if(!file_exists($nome_arquivo)){
        $msg = "Arquivo não existe";
    }else{

        // armazenando o id da pergunta a ser excluida
        $ID = $_GET['ID'];
        
        // nomeando e abrindo o arquivo temporário
        $temp_nome_arquivo = "perguntas_e_respostas_temp.txt";
        $temp = fopen($temp_nome_arquivo, "w") or die("Não foi possível abrir o arquivo");

        // abrindo o arquivo original
        $file = fopen($nome_arquivo, "r") or die("Não foi possível abrir o arquivo");

        // percorrendo o arquivo
        while(!feof($file)){
            
            // obtendo uma linha do documento
            $linha = fgets($file);

            // ignorando possíveis linhas vazias
            if(trim($linha) == "") continue;

            // quebrando os dados em um vetor
            $colunaDados = explode(";", $linha);

            // reescreve no arquivo temporário, caso o ID não for igual ao informado
            if(trim($colunaDados[0]) != $ID){
                fwrite($temp, $linha);
            }            
        }// fim while
        fclose($temp);
        fclose($file);

        // sobrescreve o arquivo temporário no arquivo original
        if(rename($temp_nome_arquivo, $nome_arquivo)){
            $msg = "Pergunta Excluida com sucesso";
        }else{
            $msg = "Algo deu errado, não foi possível renomear o arquivo";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Pergunta</title>    
</head>
<body>
    <p><?php echo $msg; ?></p>
    <ul>
        <li><a href="listarPerguntas.php">Listar Perguntas</a></li>
        <li><a href="index.html">Home</a></li>
    </ul>
</body>
</html>