<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nome_arquivo = "perguntas_e_respostas.txt";
    $pergunta = $_POST["pergunta"];
    $ID = $_POST["ID"];
    $altA = $_POST["alternativaA"];
    $altB = $_POST["alternativaB"];
    $altC = $_POST["alternativaC"];
    $altD = $_POST["alternativaD"];
    $alt_correta_id = $_POST["alternativaCorreta"];

    $file = fopen($nome_arquivo, 'a') or die("Não foi possível abrir/criar arquivo");

    $linha = $ID . ";" . $pergunta . ";" . $altA . ";" . $altB . ";" . $altC . ";" . $altD . ";" . $alt_correta_id . "\n";

    fwrite($file, $linha);
    fclose($file);
    echo "Pergunta Cadastrada";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuario</title>
</head>
<body>

    <header>        
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="cadastrarPergunta.php">Adicionar nova pergunta</a></li>
            <li><a href="buscarPergunta.html">Alterar pergunta</a></li>
            <li><a href="excluirPergunta.html">Excluir pergunta</a></li>
        </ul>
    </header>

    <form action="cadastrarPergunta.php" method="post">

        NOME:<input type="text" name="pergunta"><br>
        ID:<input type="text" name="ID">
        A)<input type="text" name="alternativaA"><br>
        B)<input type="text" name="alternativaB"><br>
        C)<input type="text" name="alternativaC"><br>
        D)<input type="text" name="alternativaD"><br>
        Alternativa correta:<input type="text" name="alternativaCorreta">

        <input type="submit" value="Enviar">
    </form>
</body>
</html>