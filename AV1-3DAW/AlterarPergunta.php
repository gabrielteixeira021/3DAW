<?php

$sigla = "";
$msg = "";
$pergunta = "";
$altA = "";
$altB = "";
$altC = "";
$altD = "";
$alt_correta_id = "";


if ($_SERVER['REQUEST_METHOD'] == 'GET')  {
    $sigla = $_GET["ID"];
    $nome_arquivo = "perguntas_e_respostas.txt";

    if (!file_exists($nome_arquivo)) {
        $msg = "Arquivo não encontrado.";
    } else {
        $file = fopen($nome_arquivo, "r") or die("Erro ao abrir o arquivo.");
        $achou = false; 

        while (!feof($file)) {
            $linha = fgets($file);
            $colunaDados = explode(";", $linha);
            
            if (trim($colunaDados[0]) == $ID) {
                $pergunta = $colunaDados[1];
                $altA = $colunaDados[2];
                $altB = $colunaDados[3];
                $altC = $colunaDados[4];
                $altD = $colunaDados[5];
                $achou = true;
                break;
            }
        }
        echo "$ID;$pergunta;$altA;$altB;$altC;$altD;$altCorreta";
        fclose($file);
        $msg = $achou ? "Pergunta Encontrada" : "Pergunta não encontrada"; 
    }
}


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
    
    <form action="alterarDadosDaPergunta.php" method="post">

        Novo NOME:<input type="text" name="pergunta" value='<?php echo htmlspecialchars($pergunta); ?>'><br>        
        A)<input type="text" name="alternativaA" value='<?php echo htmlspecialchars($altA); ?>'><br>
        B)<input type="text" name="alternativaB" value='<?php echo htmlspecialchars($altB); ?>'><br>
        C)<input type="text" name="alternativaC" value='<?php echo htmlspecialchars($altC); ?>'><br>
        D)<input type="text" name="alternativaD" value='<?php echo htmlspecialchars($altD); ?>'><br>
        Alternativa correta:<input type="text" name="alternativaCorreta" value='<?php echo htmlspecialchars($alt_correta_id); ?>'>

        <input type="submit" id="Enviar">

    </form>
</body>
</html>
