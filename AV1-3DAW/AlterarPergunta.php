<?php

$msg = "";
$pergunta = "";
$ID = "";
$altA = "";
$altB = "";
$altC = "";
$altD = "";
$altCorretaID = "";


if ($_SERVER['REQUEST_METHOD'] == 'GET')  {
    
    $ID = $_GET["ID"];
    $nome_arquivo = "perguntas_e_respostas.txt";

    if (!file_exists($nome_arquivo)) {
        $msg = "Arquivo não encontrado.";
    } else {
        $file = fopen($nome_arquivo, "r") or die("Erro ao abrir o arquivo.");
        $achou = false;

        while (!feof($file)) {
            $linha = fgets($file);

            // pula a linha caso esteja vazia
            if(trim($linha) == "") continue;

            $colunaDados = explode(";", $linha);
            
            if (count($colunaDados) >= 7 && trim($colunaDados[0]) == $ID) {
                $pergunta = $colunaDados[1];
                $altA = $colunaDados[2];
                $altB = $colunaDados[3];
                $altC = $colunaDados[4];
                $altD = $colunaDados[5];
                $altCorretaID = trim($colunaDados[6]);
                $achou = true;
                break;
            }
        }
        fclose($file);
        $msg = $achou ? "Pergunta Encontrada" : "Pergunta não encontrada"; 
    }
}


echo $msg;
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Pergunta</title>
   

</head>
<body>

    <header>
        <a href="index.html">Home</a>
    </header>
    
    <form action="alteraDadosDaPergunta.php" method="post">
    
    <br><br>

        ID: <input type="text" name="ID" value='<?php echo htmlspecialchars($ID); ?>' readonly style="background-color: #f0f0f0; cursor: not-allowed;">
        <br><br>
        Novo NOME:<input type="text" name="pergunta" value='<?php echo htmlspecialchars($pergunta); ?>'>
        <br><br>
        A)<input type="text" name="alternativaA" value='<?php echo htmlspecialchars($altA); ?>'><br><br>
        B)<input type="text" name="alternativaB" value='<?php echo htmlspecialchars($altB); ?>'>
        <br><br>
        C)<input type="text" name="alternativaC" value='<?php echo htmlspecialchars($altC); ?>'>
        <br><br>
        D)<input type="text" name="alternativaD" value='<?php echo htmlspecialchars($altD); ?>'>
        <br><br>
        Alternativa correta:<input type="text" name="alternativaCorreta" value='<?php echo htmlspecialchars($altCorretaID); ?>'>
        <br><br>

        <input type="submit" value="Enviar">

    </form>

</body>
</html>
