<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $sigla = $_POST['sigla'];
    $nome = $_POST['nome'];
    $carga = $_POST['carga'];
    
    $fileName = "disciplina.txt";
    $tempFile = 'disciplinas_temp.txt';
    
    if (!file_exists($fileName)) {
        $msg = "Arquivo não encontrado.";
    } else {
        $myFile = fopen($fileName, "r") or die("Não foi possível abrir o arquivo.");
        $temp = fopen($tempFile, "w") or die("Não foi possível criar o arquivo temporário.");
        
    while (!feof($myFile)) {
        $linha = fgets($myFile);

        if(trim($linha) == ""){
            continue;
        }
        
        $colunaDados = explode(";", $linha);
        
        // verificando a existencia de todos os dados da linha
        if(count($colunaDados)>=3){
            // verificando se a linha atual é a que deve ser alterada
            if(trim($colunaDados[1]) == $sigla){
                fwrite($temp, "$nome;$sigla;$carga\n"); // criando uma nova linha com as novas informações inseridas 
            }else{
                fwrite($temp, $linha); // reescreve a linha na ordem que tava antes
            }
        }
    }
    // fechando os arquivos
    fclose($myFile);
    fclose($temp);
    
    if (rename($tempFile, $fileName)) {
        $msg = "Disciplina atualizada com sucesso!";
    } else {
        $msg = "Erro ao atualizar a disciplina.";
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
        <li><a href="listarDisciplinas.php">Listar Disciplinas</a></li>
        <li><a href="../../index.html">Home</a></li>
    </ul>
</body>
</html>