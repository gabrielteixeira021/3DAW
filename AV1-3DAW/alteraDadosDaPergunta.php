<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    print_r($_POST);

    $ID = $_POST['ID'];
    $pergunta = $_POST['pergunta'];
    $altA = $_POST['alternativaA'];
    $altB = $_POST['alternativaB'];
    $altC = $_POST['alternativaC'];
    $altD = $_POST['alternativaD'];
    $altCorretaID = $_POST['alternativaCorreta'];
    
    $fileName = "perguntas_e_respostas.txt";
    $tempFile = "perguntas_e_respostas_temp.txt";
    
    if (!file_exists($fileName)) {
        echo "Arquivo não encontrado.";
    } else {
        $file = fopen($fileName, "r") or die("Não foi possível abrir o arquivo.");
        $temp = fopen($tempFile, "w") or die("Não foi possível criar o arquivo temporário.");
        
        while (!feof($file)) {
            $linha = fgets($file);
            
            if(trim($linha) == "") continue;           
            
            $colunaDados = explode(";", $linha);
            
            // verificando a existencia de todos os dados da linha
            if(count($colunaDados)>=7){
                // verificando se a linha atual é a que deve ser alterada
                if(trim($colunaDados[0]) == $ID){
                    $novaLinha = "$ID;$pergunta;$altA;$altB;$altC;$altD;$altCorretaID\n";
                    fwrite($temp, $novaLinha); // criando uma nova linha com as novas informações inseridas
                }else{
                    fwrite($temp, $linha); // reescreve a linha na ordem que tava antes
                }
            }
        }
        // fechando os arquivos
        fclose($file);
        fclose($temp);
        
        if (rename($tempFile, $fileName)) {
            echo "pergunta atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar a pergunta.";
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
</head>
<body>
    
    <ul>
        <li><a href="listarPerguntas.php">Listar Perguntas</a></li>
        <li><a href="index.html">Home</a></li>
    </ul>

    
</body>
</html>